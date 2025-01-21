<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->
**Table of Contents**  *generated with [DocToc](https://github.com/thlorenz/doctoc)*

- [migrations](#migrations)
- [insight_profile_source](#insight_profile_source)
- [profiles](#profiles)
- [taxonomies](#taxonomies)
- [users](#users)
- [password_resets](#password_resets)
- [failed_jobs](#failed_jobs)
- [personal_access_tokens](#personal_access_tokens)
- [concepts](#concepts)
- [insight_taxonomy](#insight_taxonomy)
- [insight_valueproposition](#insight_valueproposition)
- [insights](#insights)
- [profile_profile_source_valueproposition](#profile_profile_source_valueproposition)
- [profile_taxonomy](#profile_taxonomy)
- [images](#images)
- [source_taxonomy](#source_taxonomy)
- [valuepropositions](#valuepropositions)
- [publications](#publications)
- [publication_taxonomy](#publication_taxonomy)
- [sources](#sources)
- [source_user](#source_user)
- [taxonomy_taxonomy](#taxonomy_taxonomy)
- [taxonomy_valueproposition](#taxonomy_valueproposition)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

#Explicacion de las tablas en la Base de Datos

## migrations

``` mermaid 
 erDiagram
migrations {
integer  id 
integer  batch 
character_varying  migration 
}

```
## insight_profile_source
Esta tabla busca ser una manera de evaluar los insight para un profile dado que la opinion la genera alguien que pertenesca al mismo perfil
``` mermaid 
 erDiagram
insight_profile_source {
bigint  id 
bigint  insight_id 
bigint  source_id 
bigint  profile_id 
bigint  taxonomy_qualitativeValue_id 
bigint  taxonomy_measurementScale_id 
double_precision  quantitativeValue 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
}

```
## profiles
Profiles busca ser un tipo de entidad que puede ser utilizada para representar user persona, buyer persona o clientes ideales
``` mermaid 
 erDiagram
profiles {
bigint  id 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
character_varying  name 
character_varying  url 
}

```
## taxonomies
Abre la tabla para que veas el comentario bien

<taxonomies.name>::= <generalTaxonomy> | <projectTaxonomy> | <postTaxonomy> | <vpTaxonomy> 

<generalTaxonomy>::= taxonomy| project |recognition | post | experiences | value-point | qualitative-value types 


<postTaxonomy>::= computer science he ingenieria | ...
``` mermaid 
 erDiagram
taxonomies {
bigint  id 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
character_varying  name 
character_varying  url 
text  description 
}

```
## users

``` mermaid 
 erDiagram
users {
bigint  id 
timestamp_without_time_zone  email_verified_at 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
character_varying  password 
character_varying  name 
character_varying  email 
character_varying  remember_token 
}

```
## password_resets

``` mermaid 
 erDiagram
password_resets {
timestamp_without_time_zone  created_at 
character_varying  email 
character_varying  token 
}

```
## failed_jobs

``` mermaid 
 erDiagram
failed_jobs {
bigint  id 
timestamp_without_time_zone  failed_at 
text  connection 
text  payload 
text  exception 
text  queue 
character_varying  uuid 
}

```
## personal_access_tokens

``` mermaid 
 erDiagram
personal_access_tokens {
bigint  id 
timestamp_without_time_zone  last_used_at 
timestamp_without_time_zone  expires_at 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
bigint  tokenable_id 
character_varying  tokenable_type 
text  abilities 
character_varying  name 
character_varying  token 
}

```
## concepts

``` mermaid 
 erDiagram
concepts {
bigint  id 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
character_varying  name 
text  description 
}

```
## insight_taxonomy

``` mermaid 
 erDiagram
insight_taxonomy {
bigint  id 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
bigint  taxonomy_id 
bigint  insight_id 
}

```
## insight_valueproposition

``` mermaid 
 erDiagram
insight_valueproposition {
bigint  id 
bigint  insight_id 
bigint  valueproposition_id 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
}

```
## insights

``` mermaid 
 erDiagram
insights {
bigint  id 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
text  name 
}

```
## profile_profile_source_valueproposition
Esta tabla busca ser una manera de evaluar las propuestas de valor diseñadas para un profile dado por el profile_owner_id con la opinion de una persona del profile dado por el profile_evaluator_id
``` mermaid 
 erDiagram
profile_profile_source_valueproposition {
bigint  id 
bigint  source_id 
bigint  valueproposition_id 
bigint  profile_owner_id 
bigint  profile_evaluator_id 
bigint  taxonomy_measurementScale_id 
bigint  taxonomy_qualitativeValue_id 
double_precision  quantitativeValue 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
}

```
## profile_taxonomy

``` mermaid 
 erDiagram
profile_taxonomy {
bigint  id 
bigint  profile_id 
bigint  taxonomy_id 
}

```
## images

``` mermaid 
 erDiagram
images {
boolean  isResponsive 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
bigint  id 
character_varying  alt 
character_varying  name 
character_varying  url 
}

```
## source_taxonomy

``` mermaid 
 erDiagram
source_taxonomy {
bigint  id 
bigint  source_id 
bigint  taxonomy_id 
}

```
## valuepropositions

``` mermaid 
 erDiagram
valuepropositions {
bigint  id 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
text  name 
text  url 
}

```
## publications

``` mermaid 
 erDiagram
publications {
timestamp_without_time_zone  updated_at 
bigint  image_id 
bigint  user_id 
bigint  taxonomy_contentType_id 
timestamp_without_time_zone  created_at 
bigint  id 
text  content 
character_varying  name 
text  description 
character_varying  url 
}

```
## publication_taxonomy

``` mermaid 
 erDiagram
publication_taxonomy {
bigint  id 
bigint  taxonomy_id 
bigint  publication_id 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
}

```
## sources

``` mermaid 
 erDiagram
sources {
bigint  id 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
character_varying  name 
text  description 
}

```
## source_user

``` mermaid 
 erDiagram
source_user {
bigint  id 
bigint  source_id 
bigint  user_id 
}

```
## taxonomy_taxonomy

``` mermaid 
 erDiagram
taxonomy_taxonomy {
bigint  id 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
bigint  taxonomy_parent_id 
bigint  taxonomy_child_id 
}

```
## taxonomy_valueproposition

``` mermaid 
 erDiagram
taxonomy_valueproposition {
bigint  id 
bigint  taxonomy_id 
bigint  valueproposition_id 
timestamp_without_time_zone  created_at 
timestamp_without_time_zone  updated_at 
}

```
