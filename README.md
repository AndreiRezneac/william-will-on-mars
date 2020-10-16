
This is a basic implementation for calculating 
Mars Coordinated Time (MTC) and Mars Sol Time (MST) 
for a given UTC dateTime

TerrestrialTimeUtcAdjustmentProvider implementation is not future-proof

Very good brief explanation of the steps involved can be found here
https://github.com/dkallen78/martian-clock

to run the app (assuming you have PHP installed :D)
      
    from project root
    cd ./public
    php -S localhost:8000
    
    in your browser open: e.g.
    http://localhost:8000/v1/earth-mars-times/2020-10-16

to run the tests (from project root):
    
    bin/phpunit
    
useful commands  (from project root):
    
    bin/console
