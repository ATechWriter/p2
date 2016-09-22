# The Jabberwocky Password Generator

Create a "password" that concatenates an arbitrary selection of words from Lewis Carroll's poem "Jabberwocky" from _Alice in Wonderland_.

Features include an input box to specify the number of words to concatenate, a choice of separators, and the option to add a number and/or symbol.

## Links

* [View the live site](http://p2.josquinia.org)
* [View the demo](http://www.screencast.com/t/YzmipTqyD)

## Notes

To see the server-side validation messages, try a word a count of 10 or 1. Use a code inspector to change the input type to text to trip the `is_numeric()` condition.

## Citations

I referred to the following resources:

* [PHP Manual](http://php.net/manual/en/) - syntax, how to use functions
* [ASCII Table](http://www.asciitable.com/) - looked up ASCII values for "Add a symbol" option
* [W3Schools](http://www.w3schools.org/) - checked details of form tags/attributes (HTML) and learned how to check if the user had clicked the submit control yet
* Lewis Carroll _Alice in Wonderland_

Also, my thanks to classmates at Piazza for pointing me to the `isset()` command.
