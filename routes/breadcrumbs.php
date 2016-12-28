<?php 

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('homepage'));
});


// Home > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    // dd($category);

    $category = \LaraForum\Category::where('slug', $category)
                                     ->firstOrFail();

    $breadcrumbs->parent('home');
    $breadcrumbs->push($category->title, route('category', $category->slug));
});

// Home > [Category] > [Topic]
Breadcrumbs::register('topic', function($breadcrumbs, $category, $topic)
{
    $topic = \LaraForum\Topic::where('topic_slug', $topic)
                                     ->firstOrFail()
                                     ->load('category');
    // dd($topic->category);

    $breadcrumbs->parent('category', $topic->category->slug);
    $breadcrumbs->push($topic->title, 
                       route('topic', ['category_slug' => $topic->category->slug, 
                                       'topic_slug'    => $topic->topic_slug]));
});