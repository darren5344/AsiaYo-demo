# AsiaYo 習題
本專案使用 laravel 10.x，請使用 php 8.2 以上的版本運行，並且安裝 composer

---

## 建置步驟
- 複製編輯 .env
```
cp .env.example .env
```
- 安裝套件
```
composer install
```
- 產生 app key
```
php artisan key:generate
```
- 啟動服務
```
php artisan serve
```


---
## API 路由
```
localhost:8000/api/convert-rate?source=TWD&target=USD&amount=100
```
### Request 參數說明

|  參數名稱  | 參數說明 |  參數型態   |           說明           |
|:------:|:--------:|:-------:|:----------------------:|
| source | 服務金鑰 | string  |  必填 (只可填 TWD USD JPY)  |
| target | 玩家帳號 | string  |  必填(只可填 TWD USD JPY)   |
| amount | 玩家暱稱 | integer |           必填           |

### Response 參數說明
|   參數名稱   | 參數說明  | 參數型態 |     
|:--------:|:-----:|:--------:|
|   msg    |  訊息   |  string  | 
|  amount  | 轉換後金額 |  string  |

### Response 結果

```javascript
    {
        "msg":"success",
        "amount":"3.28"
    }
```
---

## Feature Test
```
php artisan test tests\Feature\ConvertRateTest.php
```
- 測試案例裡有寫四組轉換案例做測試,成功的話會看到四個綠燈
