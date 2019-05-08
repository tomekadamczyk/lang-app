# Lang-app
## Table of contents
* [General info](#general-info)
* [Stack](#stack)
* [Features](#features)
* [Status](#status)
* [Demo](#demo)

## General info
Simple application for learning languages. Based on JavaScript ES6 without frameworks to increase language knwoledge and skills.

## Stack
#### Backend:
 - PHP
 - MySQL
#### Frontend:
 - HTML/CSS (SASS)
 - Javascript (ES6)
#### Libraries:
 - Bootstrap 4
 - Leaflet with Mapbox
 - Leaflet Routing Machine
#### Web tools:
 - npm
 - Gulp
 - Babel
 - Webpack
 
 Config.php with database connection is not included.
 
 ## Features
 Excercises and test are based on inserted own data.
 ### Creating own words and phrases database
 1. Adding new words into database. Single word includes new word, translation, definition, subject and level
 2. Adding new phrases into database. Single phrase includes new phrase, translation, subject and level
 ### Creating own subjects.
 If a subject is created there is possibility to assigne new word. (Inserting words and phrases does not work before adding at least one subject).
 ### Excercises
 1. Flashcards - rendering random word with translation
 2. Hangman - figure out the word by provided definition
 ### Test
 1. Flashcards - automated randomly selecting word to translate after choosing a subject. Time for translating is 10 seconds. If typed word is correct, a next word is rendered and points increase +1. If time is up, next word is rendered and points do not change. Maximum of point is 10, same as attempts.
 ### Dictionary
 1. Table width added words. On click on row with a word, definition shows up. There is also possibility for editing word, translation and definition.
 2. Simple search engine.
 3. List of subjects with filtering. All subjects are active by default - uncheck any subject hides its words.
 ### Phrases
 Same view and functions as in dictionary. The only difference is no phrase definition included.
 ### Interactive travel map
 1. Routes appointment
 2. Click on any point on the map displays current weather in area.
 3. Creating own travel list. Add new city name and assigne places to travel. Add as many places as wanted.
 
 ## Status
 This is a first version of application. There are many features to implement, existing features and code structure are being improved.
 ## Demo
 Check the demo account: http://lang.tomekadamczyk.usermd.net/
 - Login: demo
 - Password: admin1234
