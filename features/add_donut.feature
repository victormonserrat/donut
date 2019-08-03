Feature: Add a donut
    In order to do not something
    As an application user
    I want to add a donut to the list

    @application
    Scenario: Adding a donut
      When I add a donut titled "Go to the third-floor corridor on the right hand side"
      Then it should be available in the list

    @application
    Scenario: Not adding a donut if already exists
      Given the donut titled "Go to the third-floor corridor on the right hand side" has been added
      Then I should not be able to add it again
