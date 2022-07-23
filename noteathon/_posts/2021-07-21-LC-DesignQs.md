---
layout: blog-post
title: "LC-DesignQs"
slug: lc-design-qs
meta-title: lc
meta-description: LC Design Qs
meta-image: https://raw.githubusercontent.com/LeetCode-OpenSource/vscode-leetcode/master/resources/LeetCode.png
published: true
---

# LC Design Qs

{% include toc.md %}

{% comment %} 
<!-- Not including since it is generated in the table TOC-->
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
{% endcomment %} 

<!--flow-start
- Solve the code(Easy : 5 M, Med : 10 M, Hard : 15 M )
- Watch 2x S30, take complexity and all
- Optimize your solution
- Watch leetcode
- Write notes
- Move ONNNN! dont think of it more
flow-end-->

##### Design HashMap
- [Why is it best to use a prime number as a mod in a hashing function?](https://cs.stackexchange.com/questions/11029/why-is-it-best-to-use-a-prime-number-as-a-mod-in-a-hashing-function)
- There are two main issues that we should tackle, in order to design an efficient hashmap data structure: 1). **hash function design** and 2). **collision handling**.
```java
// Space Complexity : O(N*K) ~ 10^4 * 10^2
// Time Complexity : O(n/k); keys/buckets
// The idea is to reduce the space usage and the way we design
// since as per the constraints the usage is at most 10^4 calls, so we can reduce the look up size by making 10^4(get,put,remove) * 10^2(lookups)
class MyHashMap {

    private static final int NUM_BUCKETS = 10000;//10^4
    private Node[] buckets;
    private class Node{
        int key, val;
        Node next;
        
        Node(int key, int val){
            this.key = key;
            this.val = val;
        }
    }
    
    public MyHashMap() {
        buckets = new Node[NUM_BUCKETS];
    }
    
    public int getHash(int key){
        return key%NUM_BUCKETS;
    }
    
    // get you the previous node, always to do the operations of insert and delete
    public Node findPrev(int key){
        int hash = getHash(key);
        Node node = buckets[hash];
        // No list created
        if(node == null){
            return null;
        }
        
        Node prev = buckets[hash]; // dummy
        Node curr = prev.next;
        
        //find the node
        while(curr!=null && curr.key!=key){
            prev = curr;
            curr = curr.next;
        }
        
        return prev;
        
    }
    
    public void put(int key, int value) {
        Node prev = findPrev(key);
        
        // if no node exist
        if(prev == null){
            prev = new Node(-1,-1);
            int hash = getHash(key);
            buckets[hash] = prev;
        }
        
        // if the key exists
        if(prev.next!=null){
            prev.next.val = value;
        }else{
            prev.next = new Node(key,value);
        }
    }
    
    public int get(int key) {
        Node prev = findPrev(key);
        // No nodes exist or the key is null
        if(prev == null || prev.next == null){
            return -1;
        }
        
        return prev.next.val;
    }
    
    public void remove(int key) {
        Node prev = findPrev(key);
        if(prev != null && prev.next != null){
            prev.next = prev.next.next;
        }
    }
}

```

#### Implement MinStack

```java
// Space Complexity : O(N) - using a copy of elemets
// Time Complexity : O(N) - moving and copying all elements from 1 stack to another.
class MinStack {

    Stack<Integer> stack;
    int minVal;
    public MinStack() {
        stack = new Stack();
        minVal = Integer.MAX_VALUE;
    }
    
    // push the old min val if new min is encountered
    public void push(int val) {
        if(val<=minVal){
            stack.push(minVal);
            minVal = val;
        }
        stack.push(val);
    }
    
    // pop normally if the minVal != peek() else 
    public void pop() {
        if(minVal == stack.peek()){
            stack.pop();
            minVal = stack.pop();
        }else{
            stack.pop();
        }
    }
    
    public int top() {
        return stack.peek();
    }
    
    public int getMin() {
        return minVal;
    }
}
```


#### Implement Q using Stack
```java
class MyQueue {

    Stack<Integer> pushStack;
    Stack<Integer> popStack;
    
    public MyQueue() {
        pushStack = new Stack<>();
        popStack = new Stack<>();
    }
    
    public void push(int x) {
        boolean isPush = true;
        transferPushPop(isPush);
        pushStack.push(x);
    }
    
    
    public int pop() {
        boolean isPush = false;
        transferPushPop(isPush);
        return popStack.pop();
    }
    
    // Add to push stack, but before that see that popStack is Empty and all are transferred to the push stack.
    // Before popping transfer from push to the pop, so that they are reversed.
    public void transferPushPop(boolean isPush){
        if(isPush){
            while(!popStack.isEmpty()){
                pushStack.push(popStack.pop());
            }
        }else{
            while(!pushStack.isEmpty()){
                popStack.push(pushStack.pop());
            }
        }
    }
    
    public int peek() {
        boolean isPush = false;
        transferPushPop(isPush);
        return popStack.peek();
    }
    
    public boolean empty() {
        return popStack.isEmpty() && pushStack.isEmpty();
    }
}

```


##### Design HashSet
```java
// Space Complexity : O(N*K) ~ 10^4 * 10^2
// Time Complexity : O(n/k); keys/buckets
class MyHashSet {

    Object[] bucketArr;
    private static final int H_KEY_SIZE = 10000;
    public MyHashSet() {
        // Design : 10^4 * 10^2 operations at a time so get faster access and reduce lookup
        bucketArr = new Object[H_KEY_SIZE]; 
    }
    
    // Check if the key doesnot exist then add the value
    public void add(int key) {
        if(!contains(key)){
            LinkedList<Integer> list = getList(key);
            if(list==null){
               bucketArr[getHash(key)] = new LinkedList<Integer>(); 
               list = getList(key);
            }
            list.addFirst(new Integer(key));
        }
    }
    
    // Get the linkedlist based on the hash value
    public LinkedList<Integer> getList(int key){
        int hash = getHash(key);
        if(bucketArr[hash]==null){
           return null;
        }
        LinkedList<Integer> list = (LinkedList<Integer>) bucketArr[hash];
        return list;
    }
    
    // Storing based in groups like [1-100] if for %100
    public int getHash(int key){
        return key%H_KEY_SIZE;
    }
    
    // if list contains value remove
    public void remove(int key) {
        LinkedList<Integer> list = getList(key);
        if(list!=null){
           list.remove(new Integer(key));
        }
    }
    
    // check if the list contains the value
    public boolean contains(int key) {
        LinkedList<Integer> list = getList(key);
        // key does not exist
        if(list==null){
           return false;
        }
        //System.out.println(" List : "+list.toString());
        // check if the list contains the key
        return list.contains(new Integer(key));
    }
}

```

### References

## Next: [Algorithms](/noteathon/java-ds-algo)
