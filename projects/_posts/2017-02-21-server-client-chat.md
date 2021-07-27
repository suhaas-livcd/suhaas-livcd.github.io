---
layout: wiki
title: Server-Client Chat
thumbnail: https://raw.githubusercontent.com/Hosteloha/LanBasedChat/master/screenshots/frankie_chat_howto.png
tagline: Minimal Server-Client communication
sort-key: 100
meta-title: Project Server-Client Chat
meta-description: This is a JAVA based chat application, which would work to the hosts connected through LAN.
meta-image: https://raw.githubusercontent.com/Hosteloha/LanBasedChat/master/screenshots/frankie_chat_howto.png
tags: [projects, java, ipc-communication, server-client]
disableComments: true
---

{% include toc.md %}
# Server-Client Communication
This is a JAVA based chat application, which would work to the hosts connected through LAN.

![All about Server-Client Chat](https://raw.githubusercontent.com/Hosteloha/LanBasedChat/master/screenshots/frankie_chat_howto.png)

### Info
- Language = Java
- GUI = JavaFx
- Build system = maven

### Application features
- 1 Server Host, multiple clients
- Different ports, different hosts
- Any other, let's discuss

### Setup
- If you have already installed java and then check java version,
> `java --version`

- If not installed jdk, then try to install latest jdk, as it supports modular dependencies, where importing of JavaFX SDK will be taken by build system maven. You will have so many advantages during deployements differerent OS.

- If JDK <= 1.8, then there is no support for maven java fx, so you can tweak some stuff and work around, but the advantage in JDK 1.8 has inbuilt JavaFX sdk, so no need to again setup.
	1. In eclipse or preferred IDE try installing JavaFX plugin through
		- Install new software > 
			- Name : e(fx)clipse
			- Site : http://download.eclipse.org/efxclipse/updates-released/3.6.0/
		- Or Install via Eclipse Marketplace by searching e(fx)clipse
	2. In your IDE, File > Import > Existing Maven Projects > Root_Dir (containing pom.xml) > Next > Finish
	3. Since JDK <=1.8 has JavaFX preinstalled, try commenting the maven dependency "org.openjfx", so as to prevent duplication class errors

	```
	<!--    
	<dependency>
	    <groupId>org.openjfx</groupId>
	    <artifactId>javafx-controls</artifactId>
	    <version>12</version>
	</dependency>
	<dependency>
		<groupId>org.openjfx</groupId>
		<artifactId>javafx-fxml</artifactId>
		<version>12</version>
	</dependency>
	-->
	```

    4. Delete the file module-info, and set up jdk/jre complaince to the preferred installed version.
	5. Project > Clean > Run project

- If JDK > 1.8, which is 9 or higher versions, please follow the below steps
	1. In your IDE, File > Import > Existing Maven Projects > Root_Dir (containing pom.xml) > Next > Finish
	2. After maven downloads the dependecies, try maven run, then a window should appear
	3. If you have more trouble, then try searching in [StackOverflow](https://stackoverflow.com/questions/51478675/error-javafx-runtime-components-are-missing-and-are-required-to-run-this-appli) for more support based on your OS
	4. Edit the Run Configuration, based on the path of your JavaFX SDK, check Main class as `com.frankie_chat.App`
	5. If module errors occurs
	`Error: JavaFX runtime components are missing, and are required to run this application`
	then please add VM args as below, else not required, replace with your [JavaFx_SDK_PATH](https://gluonhq.com/products/javafx/)

```
--module-path /Library/Java/JavaVirtualMachines/javafx-sdk-11.0.2/lib
--add-modules=javafx.controls,javafx.fxml,javafx.base,javafx.graphics,javafx.web
```

For more info regrading JavaFx setup, please visit [JavaFX Setup Guide](https://openjfx.io/openjfx-docs/)


## Next: [Page Link](/projects/refugee-rescue)
