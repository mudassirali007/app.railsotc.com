<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.header')    
    <body>
        <div class="orderPage">
        <div class="logoContainer">
            @include('layouts.logo')
        </div>
        <div class="orderContainer">
        <a href="/logout?didt={{$didt}}" class="logoutBtn">
        <svg id="logoutIcon" xmlns="http://www.w3.org/2000/svg" fill="none" height="20" viewBox="0 0 18 20" width="18">
        <path d="M7.5 0V10H10V0H7.5ZM4.3 3.6L3.35 4.375C1.325 5.975 0 8.475 0 11.25C0 16.075 3.925 20 8.75 20C13.575 20 17.5 16.075 17.5 11.25C17.5 8.475 16.175 5.975 14.15 4.375L13.2 3.6L11.625 5.55L12.575 6.325C14.025 7.475 15 9.25 15 11.25C15 14.725 12.225 17.5 8.75 17.5C5.275 17.5 2.5 14.725 2.5 11.25C2.5 9.25 3.4 7.475 4.85 6.325L5.875 5.55L4.3 3.6Z" fill="#B6B6B6"></path>
        </svg>
        </a>
        <h1 class="heading">Welcome 💰</h1>
        <p class="email">{{$user->email}}</p>
        <p class="titlePurchased">TOTAL PURCHASED</p>
        <div class="totalPurchased"></div>
        <button class="orderBtn">BUY NOW</button>
        <div class="orderListHeader">
        <p class="historyLabel">History</p>
        <svg id="refreshBtn" xmlns="http://www.w3.org/2000/svg" fill="none" height="21" viewBox="0 0 28 21" width="28">
        <path d="M14 0C8.225 0 3.5 4.725 3.5 10.5H0L5.25 17.5L10.5 10.5H7C7 6.615 10.115 3.5 14 3.5V0ZM22.75 3.5L17.5 10.5H21C21 14.385 17.885 17.5 14 17.5V21C19.775 21 24.5 16.275 24.5 10.5H28L22.75 3.5Z" fill="#B6B6B6"></path>
        </svg>
        </div>
        <div class="orderList">
            
        </div>
        </div>
        <script>
                let refreshBtn = document.querySelector('#refreshBtn')
                refreshBtn.addEventListener('click', (e) => {
                    window.location.reload();
                })
                let orderBtn = document.querySelector('.orderBtn')
                orderBtn.addEventListener('click', (e) => {
                    window.location.href = "/order?didt={{$didt}}"
                    return true
                })
                let totalPurchaseAmount = {
                    "USD": { amount: 0, symbol: "$" },
                    "EUR": { amount: 0, symbol: "€" },
                    "GBP": { amount: 0, symbol: "£" },
                    "AUD": { amount: 0, symbol: "AU$" },
                    "CAD": { amount: 0, symbol: "C$" },
                    "NZD": { amount: 0, symbol: "NZ$" },
                    "CNY": { amount: 0, symbol: "¥" },
                    "ARS": { amount: 0, symbol: "Arg$" },
                    "BRL": { amount: 0, symbol: "R$" },
                    "CHF": { amount: 0, symbol: "Fr." },
                    "CLP": { amount: 0, symbol: "CLP$" },
                    "COP": { amount: 0, symbol: "Col$" },
                    "CZK": { amount: 0, symbol: "Kč" },
                    "DKK": { amount: 0, symbol: "Kr." },
                    "HKD": { amount: 0, symbol: "HK$" },
                    "ILS": { amount: 0, symbol: "₪" },
                    "INR": { amount: 0, symbol: "₹" },
                    "ISK": { amount: 0, symbol: "Íkr" },
                    "JPY": { amount: 0, symbol: "JP¥" },
                    "KRW": { amount: 0, symbol: "₩" },
                    "MXN": { amount: 0, symbol: "Mex$" },
                    "MYR": { amount: 0, symbol: "RM" },
                    "NOK": { amount: 0, symbol: "kr." },
                    "PHP": { amount: 0, symbol: "₱" },
                    "PLN": { amount: 0, symbol: "zł" },
                    "SEK": { amount: 0, symbol: "kr" },
                    "SGD": { amount: 0, symbol: "S$" },
                    "THB": { amount: 0, symbol: "฿" },
                    "VND": { amount: 0, symbol: "₫" },
                    "ZAR": { amount: 0, symbol: "R" },
                }
                console.log(<?php echo json_encode($user->order); ?>)
            
                let orders = <?php echo $user->order ? json_encode($user->order) : '[]'; ?>;
                // let orders = JSON.parse( '[]')
                let orderListEl = document.querySelector('.orderList')
                if (orders.length === 0) {
                    let noneContainer = document.createElement('div')
                    noneContainer.className = "noneContainer"
                    let noneHeading = document.createElement('div')
                    noneHeading.className = "noneHeading"
                    noneHeading.innerText = "<Ooops...No Available History>"
                    let noneText = document.createElement('div')
                    noneText.className = "noneText"
                    noneText.innerText = "Make your first purchase 💸"
                    noneContainer.appendChild(noneHeading)
                    noneContainer.appendChild(noneText)
                    orderListEl.appendChild(noneContainer)
                } else {
                    orders.reverse().map((order) => {
                        let orderEl = document.createElement('div')
                        orderEl.className = "orderItem"
                        let orderContainerLeft = document.createElement('div')
                        orderContainerLeft.className = "orderContainerLeft"
                        // let orderData = order['order_data']
                        let orderData = JSON.parse(order.order_json)
                        let orderDate = orderData['createdAt']
                        let orderDateEl = document.createElement('div')
                        let orderDateObj = new Date(orderDate)
                        orderDateEl.innerText = orderDateObj.toLocaleString([], {
                            year: '2-digit',
                            month: '2-digit',
                            day: '2-digit',
                            hour: '2-digit',
                            minute: '2-digit',
                        });
                        orderDateEl.className = "orderDate"
                        // let paymentMethod = orderData['paymentMethodName']
                        let paymentMethod = order.payment_method_name
                        let paymentEl = document.createElement('div')
                        paymentEl.className = "orderPaymentMethod"
                        paymentEl.innerText = paymentMethod
                        let depositAddress = orderData['dest'].split(':')[1]
                        let destCurrency = orderData['destCurrency']
                        let depositAddressEl = document.createElement('div')
                        depositAddressEl.className = "depositAddress"
                        depositAddressEl.dataset.depositAddress = depositAddress
                        let depositAddressShort = `${depositAddress.slice(0, 4)}...${depositAddress.slice(-5)}`
                        depositAddressEl.innerText = `Deposit to: ${depositAddressShort} ${destCurrency}`
                        let orderId = orderData['id']
                        let orderIdEl = document.createElement('div')
                        orderIdEl.className = "orderId"
                        orderIdEl.innerText = `Order ID: ${orderId}`
                        let orderContainerLeftFirst = document.createElement('div')
                        orderContainerLeftFirst.className = "orderContainerLeftFirst"
                        orderContainerLeftFirst.appendChild(orderDateEl)
                        orderContainerLeftFirst.appendChild(paymentEl)
                        orderContainerLeft.appendChild(orderContainerLeftFirst)
                        orderContainerLeft.appendChild(depositAddressEl)
                        orderContainerLeft.appendChild(orderIdEl)
                        let orderContainerRight = document.createElement('div')
                        let sourceCurrency = orderData['sourceCurrency']
                        let sourceSymbol = totalPurchaseAmount[sourceCurrency]['symbol']
                        orderContainerRight.className = "orderContainerRight"
                        let purchaseAmount = orderData['purchaseAmount']
                        totalPurchaseAmount[sourceCurrency]['amount'] += purchaseAmount
                        let purchaseEl = document.createElement('div')
                        purchaseEl.className = "purchaseAmount"
                        purchaseEl.innerText = `+${purchaseAmount} ${sourceSymbol}`
                        let totalAmount = orderData['sourceAmount']
                        let totalEl = document.createElement('div')
                        totalEl.className = "total"
                        totalEl.innerText = `TOTAL: ${totalAmount} ${sourceCurrency}`
                        let status = orderData['status']
                        let statusElement = document.createElement('div')
                        statusElement.className = "status"
                        if (status == "COMPLETE") {
                            statusElement.innerHTML = `<img src="https://imagedelivery.net/lkj0eE8VZbZgsjUOvbSRnA/ebed57c9-5502-40d6-b88e-63badfbfe700/public"/>STATUS: <span class="statusComplete">COMPLETE</span>`
                        } else if (status == "PROCESSING") {
                            statusElement.innerHTML = `<img src="https://imagedelivery.net/lkj0eE8VZbZgsjUOvbSRnA/daab49eb-2c2d-47cd-b87a-d85f82d1ef00/public"/>STATUS: <span class="statusPending">PENDING</span>`
                        } else if (status == "FAILED") {
                            statusElement.innerHTML = `<img src="https://imagedelivery.net/lkj0eE8VZbZgsjUOvbSRnA/af273d47-1480-4a0a-4c00-1e9a1135bb00/public"/>STATUS: <span class="statusFailed">FAILED</span>`
                        }
                        orderContainerRight.appendChild(purchaseEl)
                        orderContainerRight.appendChild(totalEl)
                        orderContainerRight.appendChild(statusElement)
                        orderEl.appendChild(orderContainerLeft)
                        orderEl.appendChild(orderContainerRight)
                        orderListEl.appendChild(orderEl)
                    })
                }
                let totalPurchaseEl = document.querySelector('.totalPurchased')
                Object.entries(totalPurchaseAmount).map((item, i) => {
                    let currency = item[0]
                    let amount = item[1]['amount']
                    let symbol = item[1]['symbol']
                    if (amount > 0) {
                        let totalPurchaseCurrency = document.createElement('div')
                        totalPurchaseCurrency.className = "totalPurchasedItem"
                        totalPurchaseCurrency.id = currency
                        totalPurchaseCurrency.innerHTML = `<span class="dolladolla">${symbol}</span>${amount.toFixed(2).toString().split('.')[0]}<span class="decimalPlace">.</span><span class="secondHalfTotal">${amount.toFixed(2).toString().split('.')[1]}</span>`
                        totalPurchaseEl.appendChild(totalPurchaseCurrency)
                    }
                })
                if (totalPurchaseEl.innerHTML === "") {
                    let totalPurchaseCurrency = document.createElement('div')
                    totalPurchaseCurrency.className = "totalPurchasedItem"
                    totalPurchaseCurrency.innerHTML = `<span class="dolladolla">$</span>0<span class="decimalPlace">.</span><span class="secondHalfTotal">00</span>`
                    totalPurchaseEl.appendChild(totalPurchaseCurrency)
                }
            </script>
        <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon="{&quot;rayId&quot;:&quot;76bdf273ffa14900&quot;,&quot;version&quot;:&quot;2022.11.0&quot;,&quot;r&quot;:1,&quot;token&quot;:&quot;6e276d29129a46e7baec146019c09ef9&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>

    </body>
</html>
