---
layout: blog-post
title: "LC-Hashing"
slug: lc-hashing
meta-title: lc
meta-description: LC-Hashing
meta-image: https://raw.githubusercontent.com/LeetCode-OpenSource/vscode-leetcode/master/resources/LeetCode.png
published: true
---

# LC-Hashing

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

# Hashing
- [What is the time complexity of HashMap.containsValue() in java?](https://stackoverflow.com/questions/16757359/what-is-the-time-complexity-of-hashmap-containsvalue-in-java)


##### 205. Isomorphic Strings
- Can be dealt using SET too.
- Check both the sides using two maps, such that a character cannot be mapped to more than two characters.
```java
class Solution {
    public boolean isIsomorphic(String s, String t) {
        Map<Character, Character> map = new HashMap<>();
        Set<Character> assignedValues = new HashSet<>();
        for (int i = 0; i < s.length(); i++) {
            if (map.containsKey(s.charAt(i)) && map.get(s.charAt(i)) != t.charAt(i)) {
                return false;
            }
            if (!map.containsKey(s.charAt(i)) && assignedValues.contains(t.charAt(i))) {
                return false;
            }
            map.put(s.charAt(i), t.charAt(i));
            assignedValues.add(t.charAt(i));
        }
        return true;
    }
}
```
```java
class Solution {
    public boolean isIsomorphic(String s, String t) {
        HashMap<Character, Character> map1 = new HashMap<Character, Character>();
        HashMap<Character, Character> map2 = new HashMap<Character, Character>();
        for(int i=0;i<s.length();i++){
            char charS = s.charAt(i);
            char charT = t.charAt(i);
            if(map1.containsKey(charS)){
                // Check if equal
                if(map1.get(charS) != charT){
                    return false;
                }
            }else{
                // insert
                map1.put(charS,charT);
            }
            
            // check reverse
            if(map2.containsKey(charT)){
                // Check if equal
                if(map2.get(charT) != charS){
                    return false;
                }
            }else{
                // insert
                map2.put(charT,charS);
            }
        }
        return true;
    }
}
```

##### 49. Group Anagrams
- To group the anagrams, we split the string to characters and then sort them, which would be same order for all words with similar letters.

```java
// Time Complexity: O(NKlogK), where K is the maximum length of a string in strs. The outer loop has complexity O(N) as we iterate through each string. Then, we sort each string in O(KlogK) time.

// Space Complexity: O(NK), the total information content stored in ans.

class Solution {
    public List<List<String>> groupAnagrams(String[] strs) {
        HashMap<String, List<String>> map = new HashMap<>();
        for(int i=0;i<strs.length;i++){
            String str = strs[i];
            char[] charArr = str.toCharArray();
            // Sorting the char arrays to get the same key
            Arrays.sort(charArr);
            // Inserting to map if the key doesnt exist
            String key = String.valueOf(charArr);
            //System.out.println("Key : "+key);
            // if doesnt exist then insert new value else append to existing
            List<String> list = new ArrayList<>();
            if(map.get(key)==null){
                list.add(str);
                map.put(key, list);
            }else{
                 map.get(key).add(str);
            }
        }
        List<List<String>> values = new ArrayList<>();
        for (List<String> list : map.values()) {
            values.add(list);
            //System.out.println(list);
        }
        return values;
    }
}
```
##### 560. Subarray Sum Equals K
 - if sum[i]−sum[j]=k, the sum of elements lying between indices i and j is k
```java
// Complexity Analysis
// Time complexity : O(n). nums array is traversed only once.
// Space complexity : O(n). Hashmap  can contain up to n distinct entries in the worst case.

public class Solution {
    public int subarraySum(int[] nums, int k) {
        int count = 0, sum = 0;
        HashMap < Integer, Integer > map = new HashMap < > ();
        map.put(0, 1);
        for (int i = 0; i < nums.length; i++) {
            sum += nums[i];
            if (map.containsKey(sum - k))
                count += map.get(sum - k);
            map.put(sum, map.getOrDefault(sum, 0) + 1);
        }
        return count;
    }
}
```

##### 525. Contiguous Array
[LeetCode](https://leetcode.com/problems/contiguous-array/)

<img src="https://leetcode.com/problems/contiguous-array/Figures/535_Contiguous_Array.PNG" align="center" title="MainScreen">

```java
// Time complexity : O(n). The entire array is traversed only once.
// Space complexity : O(n). Maximum size of the HashMap will be n, if all the elements are either 1 or 0.

public class Solution {

    public int findMaxLength(int[] nums) {
        Map<Integer, Integer> map = new HashMap<>();
        map.put(0, -1);
        int maxlen = 0, count = 0;
        for (int i = 0; i < nums.length; i++) {
            count = count + (nums[i] == 1 ? 1 : -1);
            if (map.containsKey(count)) {
                maxlen = Math.max(maxlen, i - map.get(count));
            } else {
                map.put(count, i);
            }
        }
        return maxlen;
    }
}
```

##### 409. Longest Palindrome
- Palindrome each character will repeat twice, except the centre one.
```java
class Solution {
// Time Complexity: O(N), where NN is the length of s. We need to count each letter.
// Space Complexity: O(1), the space for our count, as the alphabet size of s is fixed. We should also consider that in a bit complexity model, technically we need O(logN) bits to store the count values.
    public int longestPalindrome(String s) {
        HashMap<Character, Integer> map = new HashMap<>();
        char[] charArr = s.toCharArray();
        // Since it contains lower and upper case letters
        int[] charCount = new int[128];
        for(char c : charArr){
            charCount[c]++;
        }
        
        int counter = 0 ;
        for(Integer val : charCount){
            counter += (val/2)*2;
        }
        boolean isSingleCharPresent = (counter < s.length() ? true : false);
        return counter + (isSingleCharPresent ? 1 : 0);
    }
}
```

### References

## Next: [Algorithms](/noteathon/java-ds-algo)
