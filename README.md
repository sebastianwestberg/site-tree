# Site tree

### This project is under heavy development

Site tree is a simple command line tool that takes a website and generates a tree-structured output of the link hierarchy.

The most basic site tree looks just like ```tree``` on *nix environments, when used to print the structure for a given folder:

```
.
├── about-us
│   ├── how-it-all-began
│   ├── the-board-of-directors
│   └── the-company
├── careers
│   └── current-vacancies
│       ├── senior-data-analyst
│       └── software-engineer
│           └── application-form
└── contact-us
```

## Options

### Highlight HTTP codes
Site tree can be used to highlight error codes in the generated tree, such as 404's, 500:
```
site-tree http://example.com --highlight-codes="404, 500"
```
This will print a tree with highlights for each requested url.

### Export options
The rendered tree may be exported to various formats:
```
site-tree http://example.com --format="html, csv, yml"
```

### Options file
To avoid the need of lengthy commands, the site-tree.yml file can be used instead:
```
# site-options.yml

depth: 4 # how deep the rabbit hole should go
name: '%date%'~ '%url%'

formatters:
    ConsoleFormatter: ~
    HtmlFormatter:
        css: ~
        js: ~
suites:
    basic:
        formatters:
            ConsoleFormatter: ~ 
            
    advanced:
        formatters:
            ConsoleFormatter: ~ 
            HtmlFormatter: ~
            
```
And then run site-tree with a suite profile of your choice:
```
site-tree http://example.com --suite="basic"
```