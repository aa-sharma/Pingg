#include <command.h>
#include <ESP8266AVRISP.h>



#include <eCV.h>
#include <eDataStructures.h>
#include <eDev.h>
#include <eIO.h>
#include <EloquentPersistentInt32.h>
#include <EloquentPin.h>
#include <eWisol.h>
#include <ARDUINO_ESP8266_ESP12>
#include <ARDUINO_ARCH_ESP8266>



#include <ESP8266WiFi.h>



#define MAX_NETWORKS 10



void setup() 
{
  Serial.begin(115200);
  WiFi.mode(WIFI_STA);
  WiFi.disconnect();

}


//checking area for networks
void loop() 
{
  int numNetworks = WiFi.scanNetworks ();

  for (int i=0; i< numNetowrks; i++)
  {
    Serial.println(WiFi.SSID(i));

    delay(3000);
    
  }
}
