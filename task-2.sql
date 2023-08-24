-- get not managed priorites
SELECT DISTINCT library_id
FROM (
  SELECT library_id, priority,
         ROW_NUMBER() OVER (PARTITION BY library_id ORDER BY priority) AS row_num
  FROM library_posts
) AS ranked
WHERE ranked.row_num <> ranked.priority;

-- managed priorites
UPDATE library_posts lp1
JOIN (
    SELECT
        post_id,
        library_id,
        ROW_NUMBER() OVER (PARTITION BY library_id ORDER BY priority) AS new_priority
    FROM library_posts
) lp2 ON lp1.post_id = lp2.post_id
SET lp1.priority = lp2.new_priority;
