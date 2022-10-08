---
extends: _layouts.post
section: content
title: Find all anagrams in a string
problemUrl: https://leetcode.com/problems/find-all-anagrams-in-a-string/
date: 2022-10-08
categories: [array-and-hashmap]
---

We will use counter to calculate the number of characters of string p. Then we take a sliding window of lenght p, then compare the character count with the character count of p. If we found a match, we append the starting index in the result. We will finish the loop when we reach the end of the string s and then return our result.

```python
class Solution:
    def findAnagrams(self, s: str, p: str) -> List[int]:
        res = []
        pCounter = Counter(p)
        n = len(p)
        sCounter = Counter(s[:n-1])
        
        for i in range(len(s)-n+1):
            sCounter[s[i+n-1]] += 1
            if sCounter == pCounter:
                res.append(i)
            sCounter[s[i]] -= 1
            if sCounter[s[i]] == 0:
                del sCounter[s[i]]
        return res
```

Time Complexity: `O(n*m)`, n is the length of s, m is the length of p <br/>
Space Complexity: `O(1)`
