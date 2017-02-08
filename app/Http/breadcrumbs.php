<?php

//documentation http://laravel-breadcrumbs.davejamesmiller.com/en/latest/start.html#install-laravel-breadcrumbs

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > Contact
Breadcrumbs::register('contact', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('contact', route('klantenservice'));
});

// Home > cart
Breadcrumbs::register('cart', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Cart', route('cart.index'));
});

// Home > algemene voorwaarden
Breadcrumbs::register('algemenevoorwaarden', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Terms and Conditions', route('algemeen.voorwaarden'));
});

// Home > Disclaimer
Breadcrumbs::register('disclaimer', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Disclaimer', route('algemeen.voorwaarden'));
});

// Home > Privacy
Breadcrumbs::register('privacy', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('privacy', route('privacy'));
});

// Home > Privacy
Breadcrumbs::register('manuals', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Manuals', route('guide'));
});

// Home > return
Breadcrumbs::register('return', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Return Policy', route('refund'));
});

// Home > Blog
Breadcrumbs::register('blog', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog'));
});

// Home > Blog > [Post]
Breadcrumbs::register('blog.post', function($breadcrumbs, $blog)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($blog->title, route('blog.show', str_replace(' ', '-', $blog->title)) );
});

// Giftcards
Breadcrumbs::register('giftcards', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('giftcards', route('giftcards.index'));
});

// Giftcards > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('giftcards');
    $breadcrumbs->push($category->name, route('giftcards', str_replace(' ', '-', $category->name)) );
});

// Giftcards > [Category] > [product]
Breadcrumbs::register('product', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('category', $product->category);
    $breadcrumbs->push($product->name, route('giftcard.show', array($product->name, str_replace(' ', ' ', $product->name))) );
});


//// Home > Blog > [Category] > [Page]
//Breadcrumbs::register('page', function($breadcrumbs, $page)
//{
//    $breadcrumbs->parent('category', $page->category);
//    $breadcrumbs->push($page->title, route('page', $page->id));
//});