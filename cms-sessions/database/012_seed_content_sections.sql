INSERT INTO content_sections (
    page_id,
    section_key,
    section_title,
    section_body,
    section_type,
    display_order,
    is_active
)
VALUES
(
    (SELECT id FROM pages WHERE page_slug = 'home'),
    'hero',
    'Sharing Christ Through Service',
    'Grace Bridge Missions exists to connect people with opportunities to serve, pray, give, and grow as disciples of Jesus Christ.',
    'text',
    1,
    1
),
(
    (SELECT id FROM pages WHERE page_slug = 'home'),
    'featured_verse',
    'Great Commission Focus',
    'Go therefore and make disciples of all nations. Matthew 28:19 reminds us that Christian service should point people toward Christ.',
    'verse',
    2,
    1
),
(
    (SELECT id FROM pages WHERE page_slug = 'mission'),
    'mission_statement',
    'Mission Statement',
    'Our mission is to share Christ through service, discipleship, prayer, and practical support for mission-focused ministry.',
    'text',
    1,
    1
),
(
    (SELECT id FROM pages WHERE page_slug = 'vision'),
    'vision_statement',
    'Vision Statement',
    'Our vision is to see believers encouraged, equipped, and connected to ministry opportunities that serve others faithfully.',
    'text',
    1,
    1
),
(
    (SELECT id FROM pages WHERE page_slug = 'beliefs'),
    'biblical_worldview',
    'Biblical Worldview',
    'Grace Bridge Missions believes technology, communication, and e-commerce can be used responsibly to serve others and point people toward Christ.',
    'text',
    1,
    1
),
(
    (SELECT id FROM pages WHERE page_slug = 'prayer'),
    'prayer_focus',
    'Prayer Focus',
    'Prayer is an important part of ministry. Grace Bridge Missions encourages visitors to pray for missionaries, families, churches, and communities.',
    'text',
    1,
    1
),
(
    (SELECT id FROM pages WHERE page_slug = 'donate'),
    'donation_callout',
    'Support Ministry Work',
    'Support can happen through prayer, giving, service, and sharing Christian resources with others.',
    'callout',
    1,
    1
),
(
    (SELECT id FROM pages WHERE page_slug = 'store'),
    'store_intro',
    'Christian Resource Store',
    'The store includes resources designed to encourage prayer, discipleship, outreach, and spiritual growth.',
    'text',
    1,
    1
),
(
    (SELECT id FROM pages WHERE page_slug = 'application'),
    'application_intro',
    'Serve With Grace Bridge',
    'Visitors interested in serving can use the mission application page to express interest in outreach and ministry opportunities.',
    'text',
    1,
    1
),
(
    (SELECT id FROM pages WHERE page_slug = 'contact'),
    'contact_intro',
    'Get in Touch',
    'Grace Bridge Missions welcomes questions about prayer needs, ministry opportunities, giving, and Christian resources.',
    'text',
    1,
    1
)
ON DUPLICATE KEY UPDATE
    section_title = VALUES(section_title),
    section_body = VALUES(section_body),
    section_type = VALUES(section_type),
    display_order = VALUES(display_order),
    is_active = VALUES(is_active);