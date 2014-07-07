These are the release notes for the [mediawiki-datamodel](README.md).

## Version 0.4 (under development)

* Page objects now ONLY accept a Title object for $title in their constructor.
* InvalidArgumentExceptions are now thrown when objects are constructed with the wrong types.


## Version 0.3 (2014-06-24)

#### Compatibility  changes

* Revision objects now take a Content object as $content

#### Additions

* Content class
* WikitextContent class
* Pages class


## Version 0.2 (2014-02-23)

#### Compatibility  changes

* Revision enhanced to allow more flexibility, Constructor and public functions have changed
* contentmodel has been removed from the Page class


## Version 0.1 (2014-02-23)

Initial release with the following features:

* EditInfo
* Page
* Revision
* Revisions
* Title
* User