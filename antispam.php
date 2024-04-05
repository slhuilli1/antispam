<?php
	defined('_JEXEC') or die('Access deny');
	
	class plgContentAntispam extends JPlugin 
	{
		function onContentPrepare($content, $article, $params, $limit){		
			$document = JFactory::getDocument();
			$document->addStyleSheet('plugins/content/antispam/style.css');	
			$re = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/m';
			
			preg_match_all($re, $article->text, $matches, PREG_SET_ORDER, 0);

			$mail = explode('@',$matches[0][0]);
			
			
			$article->text =  str_replace($matches[0][0],'<span>'.$mail[0]."<span class=\"arobase\"></span><span>".$mail[1]."</span>",$article->text);
		}	
	}
?>
