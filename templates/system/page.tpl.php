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
<header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
  <div class="<?php print $container_class; ?>">
    <div class="navbar-header">
      <?php if ($logo): ?>
        <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>

      <?php if (!empty($site_name)): ?>
        <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
      <?php endif; ?>

      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <?php endif; ?>
    </div>

    <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
      <div class="navbar-collapse collapse">
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
</header>

<div class="main-container <?php print $container_class; ?>">

  <header role="banner" id="page-header">
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </header> <!-- /#page-header -->

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
        <h1 class="page-header"><?php print $title; ?></h1>
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
<footer id="footer">
    <div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-push-2">
            <div class="row">
                <div class="col-sm-2">
                    <p class="header"><a href="https://www.nrel.gov">Home <i class="fa fa-angle-double-right"></i></a></p>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="header"><a href="https://www.nrel.gov/research/">Research <i class="fa fa-angle-double-right"></i></a></p>
                        </div>
                        <div class="col-sm-4">
                        <ul>
                        <li><a href="https://www.nrel.gov/manufacturing/">Advanced Manufacturing</a></li>
                        <li><a href="https://www.nrel.gov/bioenergy/">Bioenergy</a></li>
                        <li><a href="https://www.nrel.gov/buildings/">Buildings Efficiency</a></li>
                        <li><a href="https://energysciences.nrel.gov/chemical_materials/chemistry_and_nanoscience">Chemistry &amp; Nanoscience</a></li>
                        <li><a href="https://energysciences.nrel.gov/csc">Computational Science</a></li>
                        <li><a href="https://www.nrel.gov/csp/">Concentrating Solar Power</a></li>
                        </ul>
                        </div>
                        <div class="col-sm-4">
                        <ul>
                        <li><a href="https://www.nrel.gov/analysis/">Energy Analysis</a></li>
                        <li><a href="https://www.nrel.gov/esi/">Energy Systems Integration</a></li>
                        <li><a href="https://www.nrel.gov/geothermal/">Geothermal Energy</a></li>
                         <li><a href="https://www.nrel.gov/grid/">Grid Modernization</a></li>
                         <li><a href="https://www.nrel.gov/hydrogen/">Hydrogen &amp; Fuel Cells</a></li>
                          <li><a href="https://www.nrel.gov/materials-science/">Materials Science</a></li>
                        </ul>
                        </div>
                        <div class="col-sm-4">
                        <ul>


                        <li><a href="https://www.nrel.gov/pv/">Photovoltaics</a></li>
                        <li><a href="https://www.nrel.gov/solar/">Solar</a></li>
                        <li><a href="https://www.nrel.gov/tech_deployment/">Technology Deployment</a></li>
                          <li><a href="https://www.nrel.gov/transportation/">Transportation</a></li>
                        <li><a href="https://www.nrel.gov/water/">Water Power</a></li>
                        <li><a href="https://www.nrel.gov/wind/">Wind Energy</a></li>
                        </ul>
                        </div>
                        <!--div class="col-sm-2">
                        <ul>

                        </ul>
                        </div-->
                    </div>
                </div>

                <!-- Follow -->
                <div class="col-sm-2">
                    <p class="header">Follow NREL</p>
                    <ul class="social-links list-inline">
                    <li><a href="https://www.facebook.com/nationalrenewableenergylab"><i class="fa fa-facebook-square"></i></a></li>
                    <li><a href="https://www.nrel.gov/news/subscribe.html"><i class="fa fa-envelope"></i></a></li>
                    <li><a href="https://twitter.com/nrel/"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/national-renewable-energy-laboratory"><i class="fa fa-linkedin-square"></i></a></li>
                    <li><a href="https://www.youtube.com/user/NRELPR/"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="https://www.instagram.com/nationalrenewableenergylab/"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="http://feeds.feedburner.com/NrelFeatureStories"><i class="fa fa-rss-square"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- NREL is... -->
        <div class="col-sm-2 col-sm-pull-10 border-right">
            <div class="row">
                <div class="col-sm-12 only-nrel">
                    <p class="nrel-attr">NREL is a national laboratory of the <a href="http://energy.gov/">U.S. Department of Energy</a>, <a href="http://energy.gov/eere/office-energy-efficiency-renewable-energy">Office of Energy Efficiency and Renewable Energy</a>, operated by the <a href="http://www.allianceforsustainableenergy.org/">Alliance for Sustainable Energy, LLC</a>.</p>
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
                    <li><a href="http://developer.nrel.gov/">Developers</a></li>
                    <li><a href="https://images.nrel.gov/bp/#/">Image Gallery</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-2 border-right">
            <a href="http://energy.gov"><img src="https://www.nrel.gov/client/img/logo_doe_footer.svg"  alt="U.S. Department of Energy" class="logo"></a>
        </div>
    </div>



    </div>
</footer>
<!--startindex-->
<!-- == END APPLICATION FOOTER == -->
