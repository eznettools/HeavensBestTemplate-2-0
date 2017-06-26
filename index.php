<?php get_header(); ?>

<main id="articles-and-sidebar" class="flex-wrapper" role="main">
 <div class="article-list ">

 
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry','summary' ); ?>
		<?php comments_template(); ?>
	<?php endwhile; endif; ?>
	
<?php get_template_part( 'nav', 'below' ); ?>

 </div>

 <?php get_sidebar(); ?>

</main>



<style>
.flex-wrapper {
display:flex;
padding:20px 10px;
margin:auto;
max-width:1240px;
}
.article-list {flex:1 1 auto;}
#sidebar {
flex:1 1 30%;
padding: 10px;
}

#sidebar ul {list-style:none; margin:0; padding:0px;}

.xoxo li a {
display:block;
padding:10px;
background:#1184dd;
color:white;
margin:2px;
font-size:.9em;
text-decoration:none;
line-height:1.15;
border-radius:2px;
}
.xoxo li a:hover {
background:#22a0f2;
}

.searchform > div {display:flex; flex-wrap:wrap; padding:8px 0;}
.searchform #s {flex:1 1 auto; padding:8px; }
#searchsubmit {flex:1 1 2em; padding:8px 6px; border:none; background:#0085d0; color: white;}

 
.post {
display:block;
border:solid 1px #ddd;
padding:16px;
margin:16px auto;
box-shadow: 0 2px 8px rgba(0,0,0,.2);
text-decoration:none;
color:#333;
}
.post:hover {
border-color:#49d;
}

@media (max-width:450px) {
	.flex-wrapper { flex-direction:column; }
}

</style>



<?php get_footer(); ?>