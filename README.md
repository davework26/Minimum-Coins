# Minimum-Coins
Calculate the minimum number of coins needed for an amount.\
Solution written as a single PHP function.\
This was my solution in a timed programming test, where the function template is supplied and I had to complete the function's body - hence no object oriented solution. However, I did manage to include recursion! <br />
Two solutions were created:
1.  Integer version (coinsInt.php): Coin values are expressed in pence and cents and uses integer arithmetic.<br /> 
    Executable sandbox can be found [here](https://phpsandbox.io/n/minimumcoinsint-still-band-azov).
2.  Floating point BC Math version (coinsFloat.php): Coin values are expressed in pounds, dollars, euros etc. and uses the BC Math floating point arithmetic library functions.<br />
    Executable sandbox can be found [here](https://phpsandbox.io/n/minimumcoinsfloat-x7v2x).<br />
    This version contains code from the integer version commented out for easy direct comparison between the integer and floating point versions.

