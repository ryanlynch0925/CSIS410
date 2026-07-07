<?php
$products = array(
    array(
        "id"=> 1,
        "name"=> "Mission Prayer Journal",
        "description"=> "A guided journal designed to help believers pray faithfully for missionaries, families, churches, and unreached communities.",
        "price" => 12.99,
        "quantity"=> 25,
        "image"=> "images/prayer-journal.png"
    ),
    array(
        "id"=> 2,
        "name"=> "Scripture Memory Card Set",
        "description"=> "A set of Bible verse cards focused on faith, hope, service, courage, and the Great Commission.",
        "price" => 8.50,
        "quantity"=> 25,
        "image"=> "images/scripture-cards.png"
    ),
    array(
        "id"=> 3,
        "name"=> "Grace Bridge Missions T-Shirt",
        "description"=> "A comfortable ministry shirt with the Grace Bridge Missions logo and a reminder to serve others in the name of Christ.",
        "price" => 18.00,
        "quantity"=> 25,
        "image"=> "images/mission-shirt.png"
    ),
    array(
        "id"=> 4,
        "name"=> "Family Devotion Guide",
        "description"=> "A simple family devotion guide with Scripture readings, discussion questions, and prayer prompts for each week.",
        "price" => 14.75,
        "quantity"=> 25,
        "image"=> "images/devotion-guide.png"
    ),
    array(
        "id"=> 5,
        "name"=> "Outreach Care Kit",
        "description"=> "A practical care kit designed to encourage local outreach with prayer cards, encouragement notes, and ministry supplies.",
        "price" => 22.00,
        "quantity"=> 25,
        "image"=> "images/care-kit.png"
    ),
    array(
        "id"=> 6,
        "name"=> "Worship Notebook",
        "description"=> "A notebook for sermon notes, worship reflections, answered prayers, and personal spiritual growth.",
        "price" => 10.25,
        "quantity"=> 25,
        "image"=> "images/worship-notebook.png"
    ),
    array(
        "id"=> 7,
        "name"=> "Kids Bible Activity Pack",
        "description"=> "A children’s activity pack with Bible coloring pages, simple memory verses, and mission-themed learning activities.",
        "price" => 9.99,
        "quantity"=> 25,
        "image"=> "images/kids-activity-pack.png"
    ),
    array(
        "id"=> 8,
        "name"=> "Missionary Support Bracelet",
        "description"=> "A bracelet created as a reminder to pray for missionaries and support the work of sharing the gospel.",
        "price" => 6.50,
        "quantity"=> 25,
        "image"=> "images/support-bracelet.png"
    ),
    array(
        "id"=> 9,
        "name"=> "Discipleship Study Book",
        "description"=> "A beginner-friendly study book focused on following Jesus, serving others, and growing in biblical truth.",
        "price" => 16.99,
        "quantity"=> 25,
        "image"=> "images/discipleship-book.png"
    ),
    array(
        "id"=> 10,
        "name"=> "Christian Sticker Pack",
        "description"=> "A pack of faith-based stickers with encouraging phrases, Scripture references, and mission-focused designs.",
        "price" => 5.99,
        "quantity"=> 25,
        "image"=> "images/sticker-pack.png"
    ),
);

$users = array(
    "admin" => array(
        "username" => "admin",
        "password" => "Admin123!",
        "role" => "admin",
        "displayName" => "Site Administrator",
    ),
    "publisher" => array(
        "username" => "publisher",
        "password" => "Publisher123!",
        "role" => "publisher",
        "displayName" => "Content Publisher",
    ),
    "customer" => array(
        "username" => "customer",
        "password" => "Customer123!",
        "role" => "customer",
        "displayName" => "Mission Supporter",
    )
);

$ministries = array(
    array(
        "name" => "Local Outreach",
        "description" => "Serving nearby families through prayer, encouragement, food support, and community ministry partnerships.",
        "scripture" => "Galatians 6:10"
    ),
    array(
        "name" => "Missionary Support",
        "description" => "Providing prayer, financial support, and practical resources for missionaries sharing the gospel around the world.",
        "scripture" => "Matthew 28:19-20"
    ),
    array(
        "name" => "Discipleship Resources",
        "description" => "Creating Christian resources that help families, students, and churches grow in faith and biblical understanding.",
        "scripture" => "2 Timothy 2:2"
    ),
    array(
        "name" => "Children’s Ministry",
        "description" => "Helping children learn about Jesus through age-appropriate Bible lessons, activities, and mission-focused resources.",
        "scripture" => "Mark 10:14"
    )
);
?>