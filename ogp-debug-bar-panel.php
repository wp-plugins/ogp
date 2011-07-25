<?php
/**
 * Open Graph Pro Debug Bar Panel
 * @package ogp
 */
/**
 * Open Graph Pro Debug Bar Panel
 *
 * Plugs into {@link http://wordpress.org/extend/plugins/debug-bar/ Debug Bar Plugin}
 * @since 1.1
 */
class ogp__Debug_Bar_Panel extends Debug_Bar_Panel
{
  
  /**
   * renders debug output
   */
  function render()
  {
    $metatags = ogp__open_graph_pro::wp_head(true);
    echo '<div><h3>';
    /** @todo summarize plugin logic */
    _e( 'Meta Tags', 'ogp' );
    echo '</h3><p>';
    if ( class_exists ( 'SyntaxHighlighter' ) )
    {
      global $SyntaxHighlighter;
      echo $SyntaxHighlighter->parse_shortcodes ( "[html]{$metatags}[/html]" );
      $SyntaxHighlighter->maybe_output_scripts();
    }
    else
    {
      echo preg_replace('/\n/','<br/>',htmlspecialchars($metatags)); // line breaks!!!
    }
    echo '</p></div>';
  }
  
}
