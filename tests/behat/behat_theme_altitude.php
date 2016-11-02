<?php

require_once(__DIR__.'/../../../../lib/behat/behat_base.php');
require_once(__DIR__.'/../../../../lib/behat/behat_files.php');
require_once(__DIR__.'/../../../../auth/tests/behat/behat_auth.php');

use Behat\Behat\Context\SnippetAcceptingContext,
    Behat\Mink\Exception\ExpectationException as ExpectationException,
    Behat\Gherkin\Node\TableNode as TableNode;

class behat_theme_altitude extends behat_files implements SnippetAcceptingContext {

    /**
     * Opens altitude settings.
     *
     * @Given /^I go to Atitude settings$/
     */
    public function i_go_to_altitude_settings() {
        $this->getSession()->visit($this->locate_path('/admin/settings.php?section=themesettingaltitude'));
    }

    /**
     * Enable the altitude theme if it's not enabled already.
     *
     * @Given /^I enable the "(?P<themename_string>(?:[^"]|\\")*)" theme$/
     */
    public function i_enable_altitude_theme($themename) {
        $this->getSession()->visit($this->locate_path('/theme/index.php'));

        $session = $this->getSession();
        $page = $session->getPage();
        $activetheme = $page->find('css', 'table tr:first-of-type h3');
        $activethemename = $activetheme->getText();

        if ($activethemename !== $themename) {
            $submitbtn = $page->find('css', '#admindeviceselector tr:first-of-type input[type=submit]');
            $submitbtn->click();
            $session->wait(10000);
            $heading = $page->find('css', '#region-main h2');
            $headingtxt = $heading->getText();
            $xpath = '//h3[text()="'.$themename.'"]/../div/form/div/input[@type="submit"]';
            $setaltitudebtn = $page->find('xpath', $xpath);
            if (!$setaltitudebtn) {
                throw new \InvalidArgumentException(sprintf('Could not find the button.'));
            }
            $setaltitudebtn->click();
        }
    }

    /**
     * Tests whether a css-selected element has the given class.
     *
     * @Given /^The element "(?P<selector>(?:[^"]|\\")*)" should have the class "(?P<class>(?:[^"]|\\")*)"$/
     */
    public function item_has_class($selector, $class) {
        $session = $this->getSession();
        $page = $session->getPage();
        $session->wait(5000);
        $element = $page->find('css', $selector);
        if (!$element) {
            $message = sprintf('Could not find element using the selector "%s"', $selector);
            throw new \Exception($message);
        }
        $hasclass = $element->hasClass($class);
        if (!$hasclass) {
            $message = sprintf('Class "%1" not found for selector "%1"', $class, $selector);
            throw new \Exception($message);
        }
    }

    /**
     * Checks for visibility of a given css element
     *
     * @Given /^The "(?P<selector>(?:[^"]|\\")*)" css element should be visible$/
     */
    public function is_css_element_visible($selector) {
        $session = $this->getSession();
        $page = $session->getPage();
        $element = $page->find('css', $selector);
        if (!$element) {
            $message = sprintf('Could not find element using the selector "%s"', $selector);
            throw new \Exception($message);
        }
        $isvisible = $element->isVisible();
        return $isvisible;
    }


    /**
     * Uploads a file to the specified filemanager leaving other fields in upload form default.
     * The paths should be relative to moodle codebase.
     *
     * @When /^I upload the file "(?P<filepath_string>(?:[^"]|\\")*)" to the field "(?P<filemanager_field_string>(?:[^"]|\\")*)"$/
     * @throws ExpectationException Thrown by behat_base::find
     * @param string $filepath
     * @param string $filemanagerelement
     */
    public function i_upload_the_file_to_field($filepath, $filemanagerelement) {
        $this->upload_file_to_field($filepath, $filemanagerelement, new TableNode(array()), false);
    }

    /**
     * Uploads a file to filemanager
     *
     * @throws ExpectationException Thrown by behat_base::find
     * @param string $filepath Normally a path relative to $CFG->dirroot, but can be an absolute path too.
     * @param string $filemanagerelement
     * @param TableNode $data Data to fill in upload form
     * @param false|string $overwriteaction false if we don't expect that file with the same name already exists,
     *     or button text in overwrite dialogue ("Overwrite", "Rename to ...", "Cancel")
     */
    protected function upload_file_to_field($filepath, $filemanagerelement, TableNode $data, $overwriteaction = false) {
        global $CFG;

        $session = $this->getSession();
        $page = $session->getPage();

        $labelexception = 'Label '.$filemanagerelement.' not found.';
        $label = $page->find('xpath', '//label[text()="'.$filemanagerelement.'"]', $labelexception);
        $settingid = $label->getAttribute('for');
        $settingspec = str_replace('id_s_theme_altitude_', '', $settingid);
        $filemanagernode = $page->find('xpath', '//input[@name="'.$settingid.'"]', $labelexception);
        $button = $page->find('css', '#admin-'.$settingspec.' div.fp-btn-add');
        $button->mouseOver();

        // Opening the select repository window and selecting the upload repository.
        $this->open_add_file_window($filemanagernode, get_string('pluginname', 'repository_upload'));

        // Ensure all the form is ready.
        $noformexception = new ExpectationException('The upload file form is not ready', $this->getSession());
        $this->find(
            'xpath',
            "//div[contains(concat(' ', normalize-space(@class), ' '), ' file-picker ')]".
                "[contains(concat(' ', normalize-space(@class), ' '), ' repository_upload ')]".
                "/descendant::div[@class='fp-content']".
                "/descendant::div[contains(concat(' ', normalize-space(@class), ' '), ' fp-upload-form ')]".
                "/descendant::form",
            $noformexception
        );
        // After this we have the elements we want to interact with.

        // Form elements to interact with.
        $file = $this->find_file('repo_upload_file');

        // Attaching specified file to the node.
        // Replace 'admin/' if it is in start of path with $CFG->admin .
        if (substr($filepath, 0, 6) === 'admin/') {
            $filepath = $CFG->dirroot.DIRECTORY_SEPARATOR.$CFG->admin.
                    DIRECTORY_SEPARATOR.substr($filepath, 6);
        }
        $filepath = str_replace('/', DIRECTORY_SEPARATOR, $filepath);
        if (!is_readable($filepath)) {
            $filepath = $CFG->dirroot.DIRECTORY_SEPARATOR.$filepath;
            if (!is_readable($filepath)) {
                throw new ExpectationException('The file to be uploaded does not exist.', $this->getSession());
            }
        }
        $file->attachFile($filepath);

        // Fill the form in Upload window.
        $datahash = $data->getRowsHash();

        // The action depends on the field type.
        foreach ($datahash as $locator => $value) {

            $field = behat_field_manager::get_form_field_from_label($locator, $this);

            // Delegates to the field class.
            $field->set_value($value);
        }

        // Submit the file.
        $submit = $this->find_button(get_string('upload', 'repository'));
        $submit->press();

        // We wait for all the JS to finish as it is performing an action.
        $this->getSession()->wait(self::TIMEOUT, self::PAGE_READY_JS);

        if ($overwriteaction !== false) {
            $overwritebutton = $this->find_button($overwriteaction);
            $this->ensure_node_is_visible($overwritebutton);
            $overwritebutton->click();

            // We wait for all the JS to finish.
            $this->getSession()->wait(self::TIMEOUT, self::PAGE_READY_JS);
        }

    }
}
