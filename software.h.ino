#include<SoftwareSerial.h>
SoftwareSerial gsm(2,3);
String phonenumber = "+25095763839";
#define echopin 4
#define trigpin 5
#define buzzer 6
long duration;
int distance;


void setup() {
pinMode(trigpin,OUTPUT);
pinMode(echopin,INPUT);
pinMode(buzzer,OUTPUT);


  
  Serial.begin(9600);
  gsm.begin(9600);
  Serial.println("GSM starting");
  delay(2000);
  while(Serial.available()){
     Serial.write(gsm.read());
  }
  Serial.print("gsm started");
  gsm.println("AT");

}
 
void loop() {
digitalWrite(trigpin,LOW);
delay(10);
digitalWrite(trigpin,HIGH);
delay(10);
digitalWrite(trigpin,LOW);
long duration=pulseIn(echopin,HIGH);
int distance=duration*0.034/2;
Serial.print("distance");
Serial.print(distance);
Serial.println("cm");

if(distance >0 && distance<= 20){
  digitalWrite(buzzer,HIGH);
gsm.println("AT+CGMF=1");
delay(2000);
gsm.println("AT+CGMS=\"phonenumber\"");
delay(1000);
Serial.println("sending message..");
gsm.println("object detected");
delay(1000);
gsm.write(26);
while(Serial.available()){
    Serial.write(gsm.read());
}
Serial.println("message sent successfully"); 
}
else{
  digitalWrite(buzzer,LOW);
}
 

}
