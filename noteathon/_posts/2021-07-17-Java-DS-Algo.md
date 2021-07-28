---
layout: blog-post
title: "Java DS Algo"
slug: Java-DS-Algo
meta-title: Java DS Algo
meta-description: The first blog post on the new site!
meta-image: /examples/processing/creating-functions/images/random-faces-2.png
---

# Java DS Algo :anchor:

{% include toc.md %}

Table of contents
=================

<!--ts-->
  <!-- + [Introduction](#introduction)
  + [keyterms](#keyterms) 
    * [complexity](#complexity)
    * [stable_unstable](#stable_unstable)
  + [data_structures](#ds)
    * [arrays](#arrays)
  + [algorithms](#sort-algorithms)
    + [sorting](#sort-algorithms)
      * [bubble_Sort](#bubble-sort)
  + [References](#references) -->
<!--te-->

# Introduction
- organises and store data
- Which one to use ? depends on the application use, as a developer choose the best based on the scenario
- fds

## Keyterms

### Complexity

[<img src="https://upload.wikimedia.org/wikipedia/commons/7/7e/Comparison_computational_complexity.svg" width="250" alt="Wikipedia - Comparision of different algorithms"/>](https://en.wikipedia.org/wiki/Big_O_notation#/media/File:Comparison_computational_complexity.svg)

- Time : compare the worst-case in all scenarios, as we cannot compare the best or the average case.
- Memory : It is cheap, mostly now a day we dont see.
- Big (O) notation : compare the time complexity of different algorithms (no of steps)
  - e.g [Best -> Worst] : O(1) - Constant, O(log<sub>2</sub>n) - Logarithmic, O(n) - Linear, O(nlog<sub>2</sub>n) - n log*n, O(n<sup>2</sup>) - Quadratic

### Stable_Unstable
- When relative order of duplicate item is preserved it is a stable sort, else unstable.
- But who cares for integers, they can come anywhere, however OBJECTS you need to care.

### Arrays
- not dynamic, fixed size.
- Contiguous block in memory (Static length), so size to be initialized during declaration.
- Every item occupies same memory
- Object references(Strings) are of the same size.
- To calculate address : X(starting addr) + ith elem * Y(Size of each elem) - 3 steps
- Time to retrieve is same, if we know the index of elem. Constant time complexity - which is always 3 steps - O(1)
- Worst time complexity O(n)

<details>
  <summary>Arrays sample code </summary>


<pre>
package data_structures;

public class Arrays_ {
    public static void main(String[] args) {
        int[] array_ = new int[2];
        array_[0] = 1;
        array_[1] = 5;
        for (int i = 0; i < array_.length; i++) {
            System.out.println("Elem[" + i + "] : " + array_[i]);
        }
    }
}
</pre>


> O/P
> Elem[0] : 1
> Elem[1] : 5
</details>

### Sort Algorithms

#### Bubble sort
- Compare it with the next element
- In-Place algorithm, O(n^2) - quadratic
- 100 steps to sort 10 items, 10,000 for 100 items, algorithm degrades as steps increases.
- It is stable sort, because we swap only when it is `greater than >` but not `greater than equal >=`

#### Selection sort
- Keep track of the largest index
- In-Place algorithm, O(n^2) - quadratic
- Reduces swapping (only once per traversal) compared to bubble sort
- Unstable algorithm - because we swap the largest with the last index, so we might pick up the twin and place it front.

#### Insertion sort
- Pick 1 element from unsorted and place it in correct sorted position. It does by shifting right, making extra room for the new element
- In-Place algorithm, O(n^2) - quadratic
- Stable algorithm - we stop when we find <= elem, so the duplicate elem, will be placed next to it.
- Sometimes there is lot of shifitng involved, when the small number is places at the last.

#### Shell sort
- In-place, time complexity depends on gap, Worst case O(n^2)
- Unstable 
- Can improve even bubble sort using this, can decrease the swaps

### References
- [Data Structures and Algorithms: Deep Dive Using Java](https://www.udemy.com/course/data-structures-and-algorithms-deep-dive-using-java/)



## Next: [Page Link](/noteathon/Agile-Software-Methodology)
