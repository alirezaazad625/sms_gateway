```bash
git clone https://github.com/alirezaazad625/sms_gateway.git
cd sms_gateway
make up
```

For configuring sms providers do as following: <br>

`Ghasedak` : <br>
in `source/.env` set up these three environments : <br>
`MESSAGE_PROVIDER`: should set to `ghasedak`  <br>
`MESSAGE_PROVIDER_API_KEY`: should set to given api key from ghasedak  <br>

`Kavenegar` : <br>
in `source/.env` set up these three environments : <br>
`MESSAGE_PROVIDER`: should set to `kavenegar`  <br>
`MESSAGE_PROVIDER_API_KEY`: should set to given api key from ghasedak  <br>
`MESSAGE_PROVIDER_SENDER`: kavenegar given number for send messages <br>