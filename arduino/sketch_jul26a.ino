int randomNumber;

void setup() {
  // put your setup code here, to run once:
Serial.begin(9600);
}

void loop() {
  // put your main code here, to run repeatedly:
randomNumber=random(100);

Serial.print("Humedad:");
Serial.print(randomNumber);
Serial.print("\n");

delay(86400000000);//1 dia

randomNumber=random(100);
Serial.print("ph:");
Serial.print(randomNumber);
Serial.print("\n");


delay(5000);
}
