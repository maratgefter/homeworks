-- Вывести продавца с максимальной ценой заказа
SELECT
    CNAME AS `Имя`, orders.AMT AS `Цена`
FROM
    customers,
    orders
WHERE
    customers.CNUM = orders.CNUM AND AMT = (SELECT MAX(AMT) FROM orders)

-- Вывести продавца с максимальной суммой заказов
SELECT
    SNAME,
    SUM(AMT) AS 'SUM'
FROM
    salespeople,
    orders
WHERE
    salespeople.SNUM = orders.SNUM
GROUP BY
    salespeople.SNAME
HAVING
    SUM(AMT) =(
    SELECT
        MAX(A)
    FROM
        (
        SELECT
            SUM(AMT) AS A
        FROM
            orders
        GROUP BY
            SNUM
    ) AS T
)

-- Найти средний рейтинг покупателей для каждого продавца
SELECT
    SNAME, AVG(RATING)
FROM
    customers,
    salespeople
WHERE
    customers.SNUM = salespeople.SNUM GROUP BY SNAME


--сводная таблица для магазина

SELECT categories.name, product.name, product.description, product.price, product.count, product.img, product.categories_id
FROM categories, product
WHERE categories.id = product.categories_id