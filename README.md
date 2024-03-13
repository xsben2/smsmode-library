smsmode-library
===============

[![Github actions workflow status](https://img.shields.io/github/actions/workflow/status/webeweb/smsmode-library/build.yml?style=for-the-badge&color2088FF&logo=github)](https://github.com/webeweb/smsmode-library/actions)
[![Coveralls](https://img.shields.io/coveralls/github/webeweb/smsmode-library/master.svg?style=for-the-badge&color=3F5767&logo=coveralls)](https://coveralls.io/github/webeweb/smsmode-library?branch=master)
[![Scrutinizer quality](https://img.shields.io/scrutinizer/quality/g/webeweb/smsmode-library/master.svg?style=for-the-badge&color=8A9296&logo=scrutinizer)](https://scrutinizer-ci.com/g/webeweb/smsmode-library/?branch=master)
[![Packagist version](https://img.shields.io/packagist/v/webeweb/smsmode-library.svg?style=for-the-badge&color=F28D1A&logo=packagist)](https://packagist.org/packages/webeweb/smsmode-library)

[![Packagist license](https://img.shields.io/packagist/l/webeweb/smsmode-library.svg?style=for-the-badge&colorF28D1A&logo=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9Im5vbmUiIHN0cm9rZT0iI0ZGRiIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIHN0cm9rZS13aWR0aD0iMiIgZD0ibTMgNiAzIDFtMCAwLTMgOWE1LjAwMiA1LjAwMiAwIDAgMCA2LjAwMSAwTTYgN2wzIDlNNiA3bDYtMm02IDIgMy0xbS0zIDEtMyA5YTUuMDAyIDUuMDAyIDAgMCAwIDYuMDAxIDBNMTggN2wzIDltLTMtOS02LTJtMC0ydjJtMCAxNlY1bTAgMTZIOW0zIDBoMyIvPjwvc3ZnPg==)](./LICENSE)
[![composer.lock](https://img.shields.io/badge/.lock-uncommited-important.svg?style=for-the-badge&color=885630&logo=composer)](.)

Integrate sMsmode API with your projects.

[![certified](https://img.shields.io/badge/certified%20by-sMsmode-important.svg?style=for-the-badge&color=FBE100&logo=data:image/png;base64,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dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iCiAgICB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIgogICAgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIgogICAgeG1sbnM6R0lNUD0iaHR0cDovL3d3dy5naW1wLm9yZy94bXAvIgogICAgeG1sbnM6dGlmZj0iaHR0cDovL25zLmFkb2JlLmNvbS90aWZmLzEuMC8iCiAgICB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgIHhtcE1NOkRvY3VtZW50SUQ9ImdpbXA6ZG9jaWQ6Z2ltcDoyNzVhNTlkMi1lZjY2LTQwNDgtOTYzZi1hYWQ5ZDFhYmQ1MDQiCiAgIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OTAxYjlkOGItZDIyYi00OTNkLWE2ZTctYTk5ZTY4ZTc0ZTQyIgogICB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6YmM3OTQ4YzAtNWZlYy00YTY0LWJkODktZWYwZWQ2ZGMwNTM0IgogICBkYzpGb3JtYXQ9ImltYWdlL3BuZyIKICAgR0lNUDpBUEk9IjIuMCIKICAgR0lNUDpQbGF0Zm9ybT0iTGludXgiCiAgIEdJTVA6VGltZVN0YW1wPSIxNzEwMzUxMzU1NzAxMjk3IgogICBHSU1QOlZlcnNpb249IjIuMTAuMzAiCiAgIHRpZmY6T3JpZW50YXRpb249IjEiCiAgIHhtcDpDcmVhdG9yVG9vbD0iR0lNUCAyLjEwIj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAgICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii8iCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6ZGZlMmVhYzctZmE3Mi00OTlmLWIxM2YtODcxYjI0NTM5MGU4IgogICAgICBzdEV2dDpzb2Z0d2FyZUFnZW50PSJHaW1wIDIuMTAgKExpbnV4KSIKICAgICAgc3RFdnQ6d2hlbj0iMjAyNC0wMy0xM1QxODozNTo1NSswMTowMCIvPgogICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgCjw/eHBhY2tldCBlbmQ9InciPz4S305dAAACoFBMVEV9AAD////9/v3y+fXn9ezU7d284sup2ruZ06+OzqaGy6CDyp6Eyp+Iy6GT0Kqe1bOh1rWk2Lis27644MfI59Ta7+Lo9e38/v38/vzD5dCg1rSAyJtkvIVWtnpStHhQtHZPs3VQs3ZUtXlYt3xnvYh/yJuc1LK74srf8eb5/Pr+//7+/v7q9u6Qz6hpvopXtntVtXlkvIaByJyy3sPd8OTh8uen2bpywpFTtXiPz6fK6NX1+/fh8uhmvYdRtHdZt32DyZ7G5tL2+/ju+PGw3cFrv4uJzKLT7NxStHdguoLs9/Cx3cJiu4R9x5nS7NyV0axVtnpjvIW34Mb4/Prl9OpywpB6xpd/yJp+x5p3xJRbuH5auH5Xt3ug1rXz+vXi8uhduYB0w5KW0q254cjp9e7v+PPx+fTl9OvX7uBxwpDP6tnc8OPb8OPZ7+HW7d/N6de94suKzaReuoGT0avu+PLk8+rR69v6/fub1LHE5dCu3L/t9/GFyp/0+vbz+vaS0KmX0q3G59OY0673/Pm038Su3MCCyZ2l2LnO6tmy3sJ8xpjU7N3c8OSj17ZcuX9hu4PM6deHy6GOzqdlvYbj8+n7/fy/4812xJSa06/L6NZtwIyc1LF2xJOf1rRvwY6MzqXw+PN7xpje8eWm2bnJ6NVpvol5xZb5/fvm9OzY7uFbuH/V7d7B5M7N6thwwY+74cmRz6hovojg8udswIy138X3+/lguoNqv4qi17ZtwI2v3MCj17e+48x4xZVzwpHC5M/H59PA5M5uwI2a07C238aLzaTr9u+Nzqar276t3L+ByZ234Med1bLF5tLL6dbQ69pfuoHE5tG64cmIzKKU0aup2rzA5M16xZfP6tqR0Km038V1w5Oo2bvC5c+z3sO948wYI0nXAAAAAXRSTlMAQObYZgAAAAFiS0dEAIgFHUgAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAHdElNRQfoAw0RIzeY+YprAAADkElEQVR42u2cTZKrMAyEfRGwTQ5AllnBNkvWhAVnyEE4SE75ql6lZgjhRwLJ2DX97SahTE8jZGyJGAMAAAAAAAAAAAAAAAAAAAAAAH+eLLeOh7d5cTlPcOmOcD1B8c0dx4eVXDkh6mCSrRMkjOy7EyaAZu/EuStLbpwKgW9A37y/qieX4NrO8eiKyoaN7MmZbL9yh66P9Jwqv4XR3Mxp+f262xrt4UMENul6Wk6cfoxYacdzQTisJYzZj1XnCo9G1HjlpYSxFaVicFjikbRxB8XMx7jPC6YENdUlJZwnKlq+aq9jdE4/+LbjMvaCmnOWFXf2xVYJEN6YA1vAwIk+Ih3z6vFdu8tbzb1Pdpz/R3QmLdroie6lra6Z43V71ts/ol+yRlPz0XtqHnRj8PzoYGeoSEQ/ZCcY5gzX73RM1OqSeYfsjU0rKboIEh2j+DhBtN99aknRF95Y+5fXopmaJfqAXWvr/L2DkZ4KGgHRlaDou3ZcVpJBvWMnw+45TyMpmp4Pjs0PpaToljrWwf3ETPTpgzjHuUPBIRzTxKD2Rx8eDv7PC4vxl+6KWrhaR5AjsAvguLs8B0V3v5pb5ShkLzv95g7AgULES3oXYX08meJJJS26XZnKxxXnl4Ax8vs1qzY7iRB0DzHR2UIOzcXKgZp7kB8fDoKVHg3Rl5kxP4pqB/c7vUod9Gtb4ipaKdYpYfSfow6ypUuFDeqPce9fkcHdtvvmql7hmuQMiQqxXgXUqvU9aDZRzEm+iY6r0EJR6DR8KXerqPSWaHfYdAqNJZJJaPMMXjzitJoiL0529TlO99ZoIWp0FaiJM5OrvdtwjadCt/o0e1pNzaOo3jl713PdtY3RhWH1hdoB2RsTjWqi5MroY8mJNaZmZKrVpKblwoSh5nboLdOYYNA27p6bklsTEpLV64JtbwJTUCaFxZcu8mwwZ0CwugjY8y+m2sUn2m8tBbL4NG9b7WIUvZGsn3pN0TJWP1IxeitAznwZbo3biupYjV61+qS39w6pjtfo5WTdh3y8l7I6ZqOXknUZtdELm7RxGz0fIDfF95rUknX0Ro+tfk4+qE0Kqv//2SVg9DhZ54kEx5fVPtQrymLJ2o/edjYmFau/7sqkVNvoNc/8BIVJgBQ1T1UXaYj2CRot1zMW0zZI7Fb3Jj3VdUqa3y1CmUkL1Z/p0OIZ/aPdfLI2AAAAAAAAAAAAAAAAAACNf9pduW73HRGOAAAAAElFTkSuQmCC)](https://dev.smsmode.com/)

`sMsmode` provides an API that enables you to easily and automatically send SMS
messages from your applications. This API provides the following functions:

- sending immediate or scheduled SMS messages
- managing SMS replies
- SMS history
- deleting SMS message
- account balance
- creating sub-account
- transferring credits from one account to another one
- adding contact
- getting delivery report
- callback on delivery report update

If you like this package, pay me a beer (or a coffee)
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-003087.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)

## Compatibility

[![PHP](https://img.shields.io/packagist/php-v/webeweb/smsmode-library.svg?style=for-the-badge&color=777BB4&logo=php)](http://php.net)

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash
composer require webeweb/smsmode-library
```

This command requires you to have Composer installed globally, as explained in
the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the
Composer documentation.

## Usage

Read the [documentation](doc/index.md). You can also consult or execute sample
scripts into dev folder.

## Testing

To test the package, is better to clone this repository on your computer.
Open a command console and execute the following commands to download the latest
stable version of this package:

```bash
git clone https://github.com/webeweb/smsmode-library.git
cd smsmode-library
composer install
```

Once all required libraries are installed then do:

```bash
vendor/bin/phpunit
```

## License

`smsmode-library` is released under the MIT License. See the bundled [LICENSE](LICENSE)
file for details.

Please note that the sMsmode API is not free for use, see their
[product page](https://www.smsmode.com/tarifs-sms/) for details on pricing.

## Donate

If you like this work, please consider donating at
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-003087.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)

## Todo

- ~~[2 Authentication](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[2 Creating API key](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[3 Sending SMS message](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[4 Delivery report](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[5 Account balance](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[6 Creating sub-account](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[6 Deleting sub-account](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[7 Transferring credits from one account to another](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[8 Adding contacts](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[9 Deleting SMS](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[10 Sent SMS message list](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[11 Checking SMS message status](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[12 Delivery report callback](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[13 Sending SMS message with allowed reply and reply notification](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[14 Retrieving SMS replies](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[15 Sending text-to-speech SMS](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[16 Sending unicode SMS](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
- ~~[17 Sending SMS in batch mode (attached file)](https://www.smsmode.com/pdf/fiche-HTTP-api-EN.pdf)~~
