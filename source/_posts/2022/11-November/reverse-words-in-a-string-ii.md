---
extends: _layouts.post
section: content
title: Reverse words in a string II
problemUrl: https://leetcode.com/problems/reverse-words-in-a-string-ii/
date: 2022-11-29
categories: [array-and-hashmap]
---

We will reverse the entire string, then reverse each word. We will use two pointers to keep track of the start and end of each word.

```python
class Solution:
    def reverseWords(self, s: List[str]) -> None:
        self.reverse(s, 0, len(s)-1)
        self.reverseEachWord(s)
        
    def reverseEachWord(self, l: List[str]) -> None:
        n = len(l)
        start, end = 0, 0
        while start < n:
            while end < n and l[end] != ' ':
                end += 1
            
            self.reverse(l, start, end-1)
            
            start = end+1
            end += 1
    
    def reverse(self, l: List[str], left: int, right: int) -> None:
        while left < right:
            l[left], l[right] = l[right], l[left]
            left += 1
            right -= 1
```

Time complexity: `O(n)`, n is the length of the string <br/>
Space complexity: `O(1)`