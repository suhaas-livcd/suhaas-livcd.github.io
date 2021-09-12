---
layout: blog-post
title: "Java Selenium"
slug: Java-Selenium
meta-title: Java Selenium
meta-description: Best way to automate Web
meta-image: /blog/images/blog_selenium_thumb.svg
published: true
---

<img src="/blog/images/blog_selenium_thumb.svg" align="center" title="MainScreen" width="100" height="100">

{% include toc.md %}

### An automation tool - Selenium
[Selenium](https://www.selenium.dev) is a WebDriver that would support the automation of web browsers. Below is the internal architecture of working of selenium.

<img src="/blog/images/blog_selenium_arch.svg" align="center" title="MainScreen">

Based on above architecture, there are 3 main units
- **Selenium Binding Languages**:  to support multiple clients, who develop in different scripts.

- **JSON Wire Protocol**: to convert into a unified script from these multiple languages and transfer data to webdrivers. Visit [JsonWireProtocol](https://github.com/SeleniumHQ/selenium/wiki/JsonWireProtocol) to know how the requests are designed.

- **WebDrivers** and **Browsers**: The JSON data is fed to the browser driver and using a HTTP server it communicates with actual browser. The communication is in the form of REQUEST and RESPONSE, like how REST api's do.

#### Setting up selenium
- Using Maven it is pretty straightforward, you can visit the [MVNRepository](https://mvnrepository.com/artifact/org.seleniumhq.selenium). Note this selenium-java dependency all Selenium supported browsers, but if you want specific then alter your pom.xml file.

```xml
<dependency>
  <groupId>org.seleniumhq.selenium</groupId>
  <artifactId>selenium-java</artifactId>
  <version>4.0.0-alpha-7</version>
</dependency>
```

- Using the jar files, then go to SeleniumHQ [Downloads](https://www.selenium.dev/downloads/) and get the [WebDrivers](https://www.selenium.dev/documentation/webdriver/) for your browser and add into the project libraries.

### Visit the Selenium Documentation

Please check the [Selenium Documentation](https://www.selenium.dev/documentation/) for detailed information. Also, there is an option to record and playback test cases, you can check the [Selenium IDE](https://www.selenium.dev/selenium-ide/).

## How I came across Java Selenium ?

There was a time when my team was overloaded with issues. Issue complexity was trivial, it was more related to GUI and languages. After resolving each issue, we had to log our effors in [REDMINE](https://www.redmine.org) with all the data. So to log these issues, we wanted to automate the process so as to reduce the work load. The idea was to fill a shared Excel sheet and use that as input to log our team efforts. So we used Selenium for that to read the excel and use the data to fill in redmine.

## References
1. [Selenium WebDriver - Simon Stewart](https://www.aosabook.org/en/selenium.html)
2. [How Selenium-WebDriver API commands work?](https://www.pawangaria.com/post/automation/how-selenium-webdriver-api-commands-work/)
3. [JsonWireProtocol](https://github.com/SeleniumHQ/selenium/wiki/JsonWireProtocol)