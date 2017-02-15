Feature: Formatter
  In order to see the site tree in the terminal
  As a command tool user
  I need to have a formatter that specializes in presenting data in the console

Background:
  Given a config file named "fixtures/site-tree.yml" exists
  And the config file contains:
  """
  formatters:
      ConsoleFormatter: ~
  """
  And I load the config file

Scenario:
  Given the following site-tree:
  """
  {
	"http:\/\/localhost\/": {
		"\/about-us": [],
		"\/foo-bar": [],
		"\/contact": ["\/contact\/europe", "\/contact\/scandinavia"]
	}
  }
  """
  Then the formatter "ConsoleFormatter" should return:
  """
  -> http://localhost/
     - /about-us
     - /foo-bar
     - /contact
        - /contact/europe
        - /contact/scandinavia
  """