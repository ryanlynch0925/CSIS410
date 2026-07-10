INSERT INTO products (
    product_name,
    product_slug,
    product_description,
    sku,
    price,
    stock_quantity,
    category,
    is_featured,
    status
)
VALUES
(
    'Prayer Journal',
    'prayer-journal',
    'A guided prayer journal designed to help believers organize prayer requests, praises, and Scripture reflections.',
    'GBM-PRAYER-JOURNAL',
    12.99,
    25,
    'Prayer',
    1,
    'active'
),
(
    'Scripture Card Set',
    'scripture-card-set',
    'A set of Scripture cards for encouragement, memorization, and daily reminders of God’s Word.',
    'GBM-SCRIPTURE-CARDS',
    8.99,
    40,
    'Scripture',
    1,
    'active'
),
(
    'Discipleship Guide',
    'discipleship-guide',
    'A simple discipleship guide for personal study, small groups, and ministry training.',
    'GBM-DISCIPLESHIP-GUIDE',
    15.99,
    20,
    'Discipleship',
    1,
    'active'
),
(
    'Mission Support Shirt',
    'mission-support-shirt',
    'A Grace Bridge Missions shirt designed to support outreach awareness and ministry conversations.',
    'GBM-MISSION-SHIRT',
    19.99,
    30,
    'Apparel',
    0,
    'active'
),
(
    'Outreach Resource Pack',
    'outreach-resource-pack',
    'A collection of outreach materials designed to help churches and families serve their communities.',
    'GBM-OUTREACH-PACK',
    24.99,
    15,
    'Outreach',
    1,
    'active'
),
(
    'Family Devotion Booklet',
    'family-devotion-booklet',
    'A short family devotion booklet designed to help families read Scripture, pray, and discuss faith together.',
    'GBM-FAMILY-DEVOTION',
    9.99,
    35,
    'Devotion',
    0,
    'active'
)
ON DUPLICATE KEY UPDATE
    product_name = VALUES(product_name),
    product_description = VALUES(product_description),
    price = VALUES(price),
    stock_quantity = VALUES(stock_quantity),
    category = VALUES(category),
    is_featured = VALUES(is_featured),
    status = VALUES(status);