<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<!-- Site application banner -->
<!-- == GLOBAL BANNER == -->
<!--stopindex-->

<header role="banner" id="banner">
  <div class="banner-logo">
      <div class="container">
          <div class="row">
              <div class="col-sm-6 col-sm-push-6">
                  <a href="https://www.nrel.gov"><div class="logo"></div></a>
              </div>
              <div class="site-name col-sm-6 col-sm-pull-6">
                  <a class="app-name" href="/"><?php print $site_name; ?></a>
              </div>
          </div>
      </div>
  </div>
</header>
<!--startindex-->
<!-- == END GLOBAL BANNER == -->
<!-- TOP NAVIGATION -->
<!--stopindex-->
<div class="navbar-wrapper" id="topnav">
  <div id="navbar" role="navigation" class="<?php print $navbar_classes; ?>">
    <div class="<?php print $container_class; ?> app" role="">
      <!-- Toggle -->
      <div class="navbar-header">
        <button
          type="button"
          class="navbar-toggle collapsed"
          data-toggle="collapse"
          data-target="#topnav-collapse"> <span class="icon-bar-holder"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </span> <span class="navbar-toggle-label">Menu</span>
        </button>
      </div>

      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <div class="navbar-collapse collapse" id="topnav-collapse">
          <nav role="navigation">
            <?php if (!empty($primary_nav)): ?>
              <?php print render($primary_nav); ?>
            <?php endif; ?>
            <?php if (!empty($secondary_nav)): ?>
              <?php print render($secondary_nav); ?>
            <?php endif; ?>
            <?php if (!empty($page['navigation'])): ?>
              <?php print render($page['navigation']); ?>
            <?php endif; ?>
          </nav>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<!--startindex-->
<!-- END TOP NAVIGATION -->
<div class="main-container <?php print $container_class; ?>">
  <div class="row">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section<?php print $content_column_class; ?>>
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
</div>

<!-- == APPLICATION FOOTER == -->
<!--stopindex-->
<footer id="footer" class="hidden-print">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-push-2">
                <div class="row">
                    <div class="col-sm-2">
                        <p class="header"><a href="https://www.nrel.gov/">Home</a></p>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="header"><a href="https://www.nrel.gov/research/">Research</a></p>
                            </div>
                            <div class="col-sm-4">
                                <ul>
                                    <li><a href="https://www.nrel.gov/manufacturing/">Advanced Manufacturing</a></li>
                                    <li><a href="https://www.nrel.gov/bioenergy/">Bioenergy</a></li>
                                    <li><a href="https://www.nrel.gov/buildings/">Buildings</a></li>
                                    <li><a href="https://www.nrel.gov/chemistry-nanoscience/">Chemistry and Nanoscience</a></li>
                                    <li><a href="https://www.nrel.gov/computational-science/">Computational Science</a></li>
                                    <li><a href="https://www.nrel.gov/analysis/">Energy Analysis</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul>
                                    <li><a href="https://www.nrel.gov/esif/">Energy Systems Integration Facility</a></li>
                                    <li><a href="https://www.nrel.gov/geothermal/">Geothermal</a></li>
                                    <li><a href="https://www.nrel.gov/grid/">Grid Modernization</a></li>
                                    <li><a href="https://www.nrel.gov/hydrogen/">Hydrogen and Fuel Cells</a></li>
                                    <li><a href="https://www.nrel.gov/energy-solutions/">Integrated Energy Solutions</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul>
                                    <li><a href="https://www.nrel.gov/materials-science/">Materials Science</a></li>
                                    <li><a href="https://www.nrel.gov/solar/">Solar</a></li>
                                    <li><a href="https://www.nrel.gov/transportation/">Transportation</a></li>
                                    <li><a href="https://www.nrel.gov/water/">Water</a></li>
                                    <li><a href="https://www.nrel.gov/wind/">Wind</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Follow -->
                    <div class="col-sm-2">
                        <p class="header"><span id="directedit">Follow NREL</span></p>
                        <ul class="social-links list-inline">
                            <li><a href="https://www.facebook.com/nationalrenewableenergylab" aria-label="Follow NREL on Facebook"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="https://www.nrel.gov/news/subscribe.html" aria-label="Subscribe to news"><i class="fa fa-envelope"></i></a></li>
                            <li><a href="https://twitter.com/nrel/" aria-label="Follow NREL on Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/national-renewable-energy-laboratory" aria-label="Follow NREL on Linked In"><i class="fa fa-linkedin-square"></i></a></li>
                            <li><a href="https://www.youtube.com/user/NRELPR/" aria-label="Follow NREL on YouTube"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="https://www.instagram.com/nationalrenewableenergylab/" aria-label="Follow NREL on Instagram"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- NREL is... -->
            <div class="col-sm-2 col-sm-pull-10 border-right">
                <div class="row">
                    <div class="col-sm-12 only-nrel">
                        <p class="nrel-attr">The National Renewable Energy Laboratory is a national laboratory of the <a href="https://www.energy.gov/">U.S. Department of Energy</a>, <a href="https://www.energy.gov/eere/office-energy-efficiency-renewable-energy">Office of Energy Efficiency and Renewable Energy</a>, operated by the <a href="https://www.allianceforsustainableenergy.org/">Alliance for Sustainable Energy, LLC</a>.</p>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li><a href="https://www.nrel.gov/security.html">Security &amp; Privacy Policy</a></li>
                            <li><a href="https://www.nrel.gov/accessibility.html">Accessibility</a></li>
                            <li><a href="https://www.nrel.gov/disclaimer.html">Disclaimer</a></li>
                            <li><a id="contact-link" href="https://www.nrel.gov/webmaster.html">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li><a href="https://www.nrel.gov/careers/">Apply for a Job</a></li>
                            <li><a href="https://developer.nrel.gov/">Developers</a></li>
                            <li><a href="https://images.nrel.gov/bp/#/">Image Gallery</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 border-right padtop">
                <a href="https://www.energy.gov"><img src="client/img/logo-doe-footer.png" alt="U.S. Department of Energy"></a>
            </div>
        </div>
    </div>
</footer>
<!--startindex-->
<!-- == END APPLICATION FOOTER == -->
