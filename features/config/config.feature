Feature: Configuration
  In order to configure site tree
  As a command tool user
  I need to be able to provide configuration in site-tree.yml

Scenario:
  Given a config file named "fixtures/site-tree.yml" exists
  And the config file contains:
  """
  formatters:
      ConsoleFormatter: ~
  """
  And I load the config file
  Then I should get "\Sebastianwestberg\SiteTree\Formatter\ConsoleFormatter" as a configured formatter