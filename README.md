# NREL Bootstrap

NREL Bootstrap is a Bootstrap-based theme that implements the NREL Application standard theme.

Find out more about the standards at https://www.nrel.gov/comm-standards/web/application.html and view the demo at https://www.nrel.gov/comm-standards/web/app-template/index.html.

The Drupal 8 version of the theme is a sub-theme of [Bootstrap](https://www.drupal.org/project/bootstrap). [This issue](https://www.drupal.org/project/bootstrap/issues/2554199) tracks the status of a Bootstrap 4 or 5 implementation. Because there is no BS4 or 5 implementatation ready, the Drupal 9 version of NREL Bootstrap uses [Bootstrap Barrio](https://www.drupal.org/project/bootstrap_barrio) as it's base theme.

For Drupal, we prefer developers use the [package](https://packagist.org/packages/nrel/nrel_bootstrap) rather that going directly to github.  This is because using the package will guarantee that developers are using a stable version (with version numbers) rather than something that is unstable.  In addition the packages will automatically stay up to date for such things as security remediations.

To install the nrel/nrel_bootstrap package:

### Drupal 9
@see https://github.com/NREL/nrel_bootstrap/blob/8.x-4.5.3/README.md.

Run the NREL Bootstrap post install commands from the root project to copy the Bootstrap library and the JS, CSS and images used in the NREL Application theme to the correct places for use in NREL Bootstrap.

* composer require nrel/nrel_bootstrap:dev-8.x-4.5.3<br>
* composer run-script post-install-cmd -d ./docroot/themes/contrib/nrel_bootstrap

### Drupal 8
@see https://github.com/NREL/nrel_bootstrap/blob/2.0.0/README.md

* composer require nrel/nrel_bootstrap:~2.0.0-dev<br>

### For Drupal 7
@see https://github.com/NREL/nrel_bootstrap/blob/d7/README.md

* composer require nrel/nrel_bootstrap "dev-d7"

### Todo
* top nav drop-downs