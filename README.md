# Login Example
沒有 demo  
給別人看怎麼正常登入註冊登出ㄉ

### 建立資料表
```sql
--
-- 資料表結構 `account`
--
CREATE TABLE `account` (
  `No` int(11) NOT NULL,
  `username` char(16) NOT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 資料表索引 `account`
--
ALTER TABLE `account` ADD PRIMARY KEY (`No`);

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `account`
--
ALTER TABLE `account`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
```