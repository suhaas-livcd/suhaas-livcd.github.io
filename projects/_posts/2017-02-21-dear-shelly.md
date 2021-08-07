---
layout: wiki
title: Dear Shelly
thumbnail: /projects/images/dear_shelly/dshelly_thumbnail.png 
tagline: Yet another sharing app, but with a punch!!!
sort-key: 100
meta-title: Project Shelly
meta-description: In-Progress a beautiful application
meta-image: /projects/images/dear_shelly/dshelly_thumbnail.png
tags: [projects, android, hosto]
disableComments: true
---

{% include toc.md %}

**Dear Shelly** is productivity tool - economical personal assitant and it has helped me a lot in my journey. I wanted my days to be logged, which helps while you retrospect yourself. Either you can maintain a physical diary or something digital like this. I also use Google Calendar, to create tasks, which is synced across all the devices.

## Releases
There are 3 version that I created,

| Name | About |
| :---   | :--- |
| [*Dear Shelly - My Day*](https://github.com/suhaas-livcd/MyDailyScripts/tree/master/DearShelly)| Shell script - way back when I was into scripting |
| [*ShellyInPie*](https://github.com/suhaas-livcd/PychieWorks/tree/master/ShellyInPy/main) | PyQt while I was working on computer vision using python |
| [*ShellyFx - Make Your Day Count*](https://github.com/suhaas-livcd/MyDailyScripts/tree/master/JavaFx) | JavaFx, just wanted to make it cross platform, easy to deploy |

## ShellyFX
Let's talk about the current version that I currently use. This is very robust when compared to the other versions.


| Core Stack| JavaFx, JGit, Gson, Sl4j, [BouncyCastle](https://www.bouncycastle.org) |

[JGit](https://eclipse.org/jgit/) is a lightweight, pure Java library implementation of the Git version control system – including repository access routines, network protocols, and core version control algorithms. To know how to use, check this [vogella_tutorial](https://www.vogella.com/tutorials/JGit/article.html).

To get started with [BouncyCastle](https://www.bouncycastle.org), you can check this [baeldung_blog](https://www.baeldung.com/java-bouncy-castle).


#### Main UI
<img src="/projects/images/dear_shelly/dshelly_annoted_fx.png" align="center" title="MainScreen">

## ShellyInPie

This was designed using [PyQT](https://riverbankcomputing.com/software/pyqt/intro). There are two reasons that I created in this framework, Firstly, I was a bit curious how QT behaves in python as I had used it in C/C++, well its fine but so legacy as its in native. Secondly, during that time I was learning [Computer Vision](https://en.wikipedia.org/wiki/Computer_vision) using Python, so I wanted to develop this tool so as to get into groove.
The challenge here was [piping](https://www.geeksforgeeks.org/piping-in-unix-or-linux/) the commands, while I was developing in shell script, this was not at all a problem as it directly communicates with kernel. Another challenge was about [Waiting For A Signal](https://www.riverbankcomputing.com/pipermail/pyqt/2014-May/034270.html), as when you are saving or commiting, you want to know whether the event has happened or not keeping the GUI alive. So, if you see in the below screen captures you can find some error dialog's that tell you the state of event.

| Core Stack| PyQt5, QtWidgets, QtGui, QtCore, sqlite3, subprocess (PIPE), QThread, pyqtSignal |

#### Main UI
<img src="/projects/images/dear_shelly/pyshelly_main.png" align="center" title="MainScreen" >

#### Dialogs
<img src="/projects/images/dear_shelly/pyshelly_file_state.png" align="center" title="MainScreen"  width="400" > <img src="/projects/images/dear_shelly/py_shelly_file_error.png" align="center" title="MainScreen"  width="300">


## Dear Shelly - El Clásico

This was designed using pure shell script but for dialog boxes I used [Zenity](https://en.wikipedia.org/wiki/Zenity). To get started with Zenity, you can refer this [blog](https://www.howtogeek.com/107537/how-to-make-simple-graphical-shell-scripts-with-zenity-on-linux/).

| Core Stack| Shell, Zenity |

#### Main UI
<img src="/projects/images/dear_shelly/shelly_classic.png" align="center" title="MainScreen">

### Quick tips
Some Quick tips, that can help you while writing your bash script

- To check for empty fields in the user input

``` bash   
if [[ -z "$userInput" ]]; then
   printf '%s\n' "No input entered"
   exit 1
```

- Setting Internal Field Separator (IFS), read more on this [blog](https://bash.cyberciti.biz/guide/$IFS)

``` bash
IFS='|'                             # | is set as delimiter
read -ra ADDR <<< "$mRawFormData"   # str is read into an array as tokens separated by IFS
arraylength=${#ADDR[@]}             # get length of an array
```

- It is easy to format the date, check this [blog](https://www.shell-tips.com/linux/how-to-format-date-and-time-in-linux-macos-and-bash/). This was useful for me to create the directories structure like `/diary/2020/Apr/05_Apr_2020_044159.json`

``` bash
CURRENT_DATE="`date "+%d_%b_%Y_%H:%M:%S"`" # 08_Aug_2021_01:47:53
CURRENT_MONTH="`date "+%b"`"               #Aug
CURRENT_YEAR="`date "+%Y"`"                #2017
echo $CURRENT_YEAR
```