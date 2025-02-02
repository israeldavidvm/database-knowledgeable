<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->
**Table of Contents**  *generated with [DocToc](https://github.com/thlorenz/doctoc)*

- [Database Knowledgeable](#database-knowledgeable)
  - [License](#license)
  - [Characteristics What does it offer?](#characteristics-what-does-it-offer)
  - [features to implement / characteristics to be implemented](#features-to-implement--characteristics-to-be-implemented)
  - [Planning, Requirements Engineering and Risk Management / Planning, Requirements Engineering and Risk Management](#planning-requirements-engineering-and-risk-management--planning-requirements-engineering-and-risk-management)
  - [Design Software / Software Design](#design-software--software-design)
    - [Structural perspective](#structural-perspective)
      - [Logica view of software architecture](#logica-view-of-software-architecture)
    - [Behavior perspective](#behavior-perspective)
  - [Documentation](#documentation)
    - [Conventions used during documentation](#conventions-used-during-documentation)
    - [Support and limiting algorithms](#support-and-limiting-algorithms)
      - [Algorithms used to determine PK, FK and other attributes](#algorithms-used-to-determine-pk-fk-and-other-attributes)
        - [Name conventions used for the identification of elements](#name-conventions-used-for-the-identification-of-elements)
          - [Primary keys](#primary-keys)
          - [Examples](#examples)
          - [Foraneal keys](#foraneal-keys)
          - [Examples](#examples-1)
    - [Use](#use)
      - [Requirements](#requirements)
        - [Facility](#facility)
          - [as a user](#as-a-user)
          - [as a library (only if you want to create a program that uses library)](#as-a-library-only-if-you-want-to-create-a-program-that-uses-library)
        - [File .env](#file-env)
      - [use from the command line interface](#use-from-the-command-line-interface)
        - [If it is included in a project by required with the global (composer global requires Israeldavidvm/Database-KNowledgeable)](#if-it-is-included-in-a-project-by-required-with-the-global-composer-global-requires-israeldavidvmdatabase-knowledgeable)
        - [If it is included in a project through require without the Global](#if-it-is-included-in-a-project-through-require-without-the-global)
        - [If it is installed by installing or starts from the project root (composer install israeldavidvm/database-knowledgeable)](#if-it-is-installed-by-installing-or-starts-from-the-project-root-composer-install-israeldavidvmdatabase-knowledgeable)
      - [use as library](#use-as-library)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

<!-Start doctoc generated touch please keep comment here to allow Auto Update->
<!-Don's Edit This Section, Instead Re-Run Doctor to Update->
** Table of content ***generated with [doctoc] (https://github.com/thlorenz/doctoc)*

- [Database Knowledgeable] (#databaseknowledageable)
- [License] (#license)
-[CHARACTERISTICS WHAT OFFER YOU?] (#CHARACTERISTICS-%C2%BFQU%C3%A9-TE-DEFREE)
-[features to implement / characteristics to be implemented] (#features-to-implement-caracteristic-to-implement)
-[Planning, Requirements Engineering and Risk Management / Planning, Requirements Engineering and Risk Management] (#Planning-Requirements-Engineering-And-Risk-Management-Planning-Ingenieria-De-Requerlations-Y-Gestion-Del-Riesgo )
-[Software Design / Software Design] (#Software-Design-Dise%C3%B1O-De-Software)
- [Structural Perspective] (#perspective-structural)
-[Logic view of software architecture] (#-logic-of-the-architecture-del-software)
-[behavior perspective] (#perspective-of-behavior)
- [Documentation] (#Documentation)
-[Conventions used during documentation] (#Conventions-Useas-During-Documentation)
-[Support and limiting algorithms] (#support-and-limiting-of-the-algorithms)
-[Algorithms used to determine PK, FK and other attributes] (#algorithmos-uded-for-end-pk-fk-and-demributes)
-[Name conventions used for the identification of elements] (#conventions-of-numbers-for-for-identification-of-element)
- [Primary keys] (#Keys-First)
- [Examples] (#examples)
- [Foraneal Keys] (#Key-Foreropes)
- [Examples] (#examples-1)
- [Use] (#use)
- [Requirements] (#requirements)
- [Installation] (#installation)
- [as a user] (#as-user)
-[As a library (only if you want to create a program that uses library)] (#as-biblioteca-only-si-want-you-with-a-program-which-your-libreria)
- [.env] (#file-env)
-[Use from the command line interface] (#use-from-the-interfaz-of-line-de-compos)
-[Use as a library] (#use-as-libreria)
- [Make to Donation. Your Contribution Will Make A Difference.] (#Make-A-Donation-Your-Contribution-Will-Make-A-Difference)
-[Find me on:] (#Find-me-on)
-[Technologies used / used technologies] (#Technologies-ined-Tecnologias-Usadas)

<!-End doctoc generated touch please keep comment here to allow Auto Update->


# Database Knowledgeable

[Readme version in English] (./ Readme-en.md)

Database-KNOWLEDGEABLE allows you to obtain basic infomction of your database, generate reports and documentation in popular formats such as Markdown and Mermaid. More specifically

! [alt text] (image.png)

## License

This Code is licensed under the general public license of GNU version 3.0 or posterior (LGPLV3+). You can find a complete copy of the license at https://www.gnu.org/licenses/lgPl-3.0-standalone.htmlalone.html0-standalone.html

## Characteristics What does it offer?

Database-KNOWLEDGEABLE allows you to obtain basic infomction of your database, generate reports and documentation in popular formats such as Markdown and Mermaid. More specifically

- It generates a Markdown report where each table of your database is stated, next to a Mermaid diagram, a brief explanation of the table, its fields, etc.

- PostgreSql is only supported

- Command line interface to access the functions of the library

## features to implement / characteristics to be implemented

- Generation of diagrams entity relationship

- Generation of the relational model

- Support to more database managers systems
## Planning, Requirements Engineering and Risk Management / Planning, Requirements Engineering and Risk Management

These sections of the project will be carried out through a site in Notion so that they can be easily accessible by non -technical staff.

Request access link to authorized personnel

## Design Software / Software Design

### Structural perspective

#### Logica view of software architecture

### Behavior perspective

## Documentation

### Conventions used during documentation

Notation conventions for grammar:

<> Are used to surround a non -terminal symbol

The :: = Used for production rules

Non -terminal symbols are expressed as a normal chain or characters

The following group of symbolic pairs, should be used together with expressions as follows: the first in each couple is written as suffix after the expression and the second surrounds the expression.

He ? or [] indicate that the expression is optional

The * or {} indicates that the expression is repeated or more times

The + indicates that the expression is repeated 1 or more times

If you want to use one of the previous characters, it must be preceded \ with

### Support and limiting algorithms

Unfortunately some SGBD support SQL standards differently so there is no universal algorithm that works perfectly for all SGBD.

We hope in the future to change this but currently only use it as a personal tool and I lack the time resources to add these characteristics, only proven support will be provided to PostgreSql

#### Algorithms used to determine PK, FK and other attributes

Although the set of information_schema views could be used to determine some of the database structures

It was discovered that in PostgreSql joins additives, so names of names by speed were usually used. We hope to improve this characteristic in the future.

Example of Join Additive Failure

For example, if you would like to know if a column in the information_schema.Key_column_usage is a primary key, foreign key, etc., the query should be used

`` sql
Select Kcc.Column_name, Kcc.
From
Information_schema.able_constraints TC
Join
INFORMATION_SCHEMA.KEY_COLUMN_USAGE KC
On Tc.constraint_name = kcu.constraint_name
``
However, if we carefully observe these results, they are affected by an additive Join

For the particular case of having
`` sql
Select column_name, table_name from information_schema.Key_column_usage where table_name ~ '^insight_taxonomy $'
``

that shows results in this way

! [Information_schema.Key_column_usage_where_name_insight_taxonomy] (images/key_column_usage_where_nable_name_insight_taxonomy.png)

and a
`` sql
Select TC.Constraint_name
From
Information_schema.able_constraints TC
WHERE
tc.constraint_name ~ '^taxonomy_id_fkey $'
``
that shows results in this way

! [Table_constraints_where_taxonomy_id_fkey] (images/table_constraints_where_taxonomy_id_fkey.png)

You have to

`` sql
Select Kcc.Column_name, Kcc.
From
Information_schema.able_constraints TC
Join
INFORMATION_SCHEMA.KEY_COLUMN_USAGE KC
On Tc.constraint_name = kcu.constraint_name
WHERE
Kcc.able_name ~ '^insight_taxonomy $'

``

generates the following results that reflect the join additive

! [Adivivoin.png] (images/adionntivejoin.png)

##### Name conventions used for the identification of elements

###### Primary keys
All ID name attribute

###### Examples
id

###### Foraneal keys
Any attribute that has the following way
``
<Tabllasigular name> [_ <bol>] _ id

Where [role] serves to identify the entity in recursive relationships

``

Coincides with the following regular expression
``
^[a-za-z0-9ñ]+(?: _ [a-za-z0-9ñ]+)? _ Id $
``
###### Examples
- User_id
- Taxonomy_child_id
- Taxonomy_Parent_id

### Use

#### Requirements

##### Facility

###### as a user

Composer Install Israeldavidvm/Database-KnowLedageable

Global composer requires Israeldavidvm/Database-KnowLedageable

Composer requires Israeldavidvm/Database-KnowLedageable


###### as a library (only if you want to create a program that uses library)
Composer requires Israeldavidvm/Database-KnowLedageable

##### File .env

Establish a configuration in the .env file. Like the next

``

DB_connection = PGSQL
Db_host = 127.0.0.1
DB_Port = 5432
Db_database = <databasename>
Db_usename = <suername>
DB_Password = <password>

``

#### use from the command line interface

##### If it is included in a project by required with the global (composer global requires Israeldavidvm/Database-KNowledgeable)

In order to use the program you will only need an .EV file with the configuration of your database as specified above and execute the command


`` ~/.config/composer/vendor/bin/database-knowLedageable app: generateMarkDowndocumentation [<peph> [<Path>]] `` `` `` `` `` ``

Arguments:
Depth depth [default: 1]
Path the route to the .env file. [default: "./.env"]

Options:
-H, -Help Display Help for the Given Command. WHEN NO COMMAND IS GIVEN DISPLAY HELP FOR THE LIST COMMAND
-Silent do not output any message
-q, --quie Only Error Displayed. All other output is support
-V, -Version Display This Application Version
`` Ansi | --No-Ansi Force (OR DISABLE --No-Ansi) ANSI OUTPUT
-N, --No-Interaction do not ask any interactive question
-V | VV | VVV, -Verbose Increase The Verbosity of Messages: 1 For Normal Output, 2 For More Verbose Output and 3 for Debug

##### If it is included in a project through require without the Global

In order to use the program you will only need an .EV file with the configuration of your database as specified above and execute the command


`'.

Arguments:
Depth depth [default: 1]
Path the route to the .env file. [default: "./.env"]

Options:
-H, -Help Display Help for the Given Command. WHEN NO COMMAND IS GIVEN DISPLAY HELP FOR THE LIST COMMAND
-Silent do not output any message
-q, --quie Only Error Displayed. All other output is support
-V, -Version Display This Application Version
`` Ansi | --No-Ansi Force (OR DISABLE --No-Ansi) ANSI OUTPUT
-N, --No-Interaction do not ask any interactive question
-V | VV | VVV, -Verbose Increase The Verbosity of Messages: 1 For Normal Output, 2 For More Verbose Output and 3 for Debug

##### If it is installed by installing or starts from the project root (composer install israeldavidvm/database-knowledgeable)

In order to use the program you will only need an .EV file with the configuration of your database as specified above and execute the command


`` Composer Generakdowndocumentation [<peph> [<Path>]] `` ``

Arguments:
Depth depth [default: 1]
Path the route to the .env file. [default: "./.env"]

Options:
-H, -Help Display Help for the Given Command. WHEN NO COMMAND IS GIVEN DISPLAY HELP FOR THE LIST COMMAND
-Silent do not output any message
-q, --quie Only Error Displayed. All other output is support
-V, -Version Display This Application Version
`` Ansi | --No-Ansi Force (OR DISABLE --No-Ansi) ANSI OUTPUT
-N, --No-Interaction do not ask any interactive question
-V | VV | VVV, -Verbose Increase The Verbosity of Messages: 1 For Normal Output, 2 For More Verbose Output and 3 for Debug


#### use as library

In any pHP file it calls the library as follows

``

<? PHP

Include __dir __. "/vendor/Autoload.php";

Use Israeldavidvm \ DatabaseknowLedgeable \ Databaseknowledgeable;

$ metainfoenvfile = [
'Pathenvfolder' => '.',
'name' => '.
'mode' => 'exclude',
'Tables' => [],
];

$ databaseknowledgeable = new databaseknowledgeable ($ metainfoenvfile);

$ databaseknowledgeable-> generateMarkDowndocumentation ($ depth);

``

Exit table example

! [alt text] (image.png)

### Make to Donation. Your Contribution Will Make to Difference.
[! [ko-fi] (https://ko-fi.com/img/githubutton_sm.svg)] (https://ko-fi.com/israeldavidvm)
[! [PayPal] (https://img.shields.io/badge/paypal-@israeldavidvm-0077b5?style=for-the-badge&ogo=paypal&logocolor=white&labelColor=101010)] (https://paypal.me/israeldavidvm )
[! [Binance] (https://img.shields.io/badge/binance_id-809179020-1010 ?style=for Activity/Referral-Entry/CPa? Ref = CPA_004ZGH9EIS)

### Find me on:
[! [Github] (https://img.shields.io/badge/github-israeldavidvm-gray?
[! [LinkedIn] (https://img.shields.io/badge/linkedIn-israeldavidvm-0077b5?style=for-the-badge&ogo=LinkedI in/Israeldavidvm/)
[! [Twitter] (https://img.shields.io/badge/twitter-@israeldavidvm-1da1f2?style=FOR-the-badge&ogo=twitter&logocolor=white&labelColor=101010)] (https://twitter.com/israeldavidvm )
[! [Facebook] (https://img.shields.io/badge/facebook-israeldavidvm-1877f2? Israeldavidvm)
[! [Instagram] (https://img.shields.io/badge/instagram-@israeldavidvmv-gray?style=for-the-badge&ogo=instagram&logocolor=White&labelColor=101010)] (https://www.instagram.com /Israeldavidvm/)
[! [Tiktok] (https://img.shields.io/badge/tiktok-@israeldavidvm-e4405f?style=FOR-the-badge&ogo=tiktok&logocolor=white&labelColor=101010)] (https://www.tiktok.com /@Israeldavidvm)
[! [YouTube] (https://img.shields.io/badge/youtube-@israeldavidvm-ff0000?style=FOR-the-badge&ogo=youtube&logocolor=white&labelcolor=101010)] (https://www.youtube.com /Channel/UCMZLFPENPDWPJOHAL0WRY7A)

## Technologies used / used technologies

[! [PHP] (https://img.shields.io/badge/php-blue?ogo=php&style=for
