---
extends: _layouts.post
section: content
title: Maximum length of a concatenated string with unique characters
problemUrl: https://leetcode.com/problems/maximum-length-of-a-concatenated-string-with-unique-characters/
date: 2022-10-24
categories: [array-and-hashmap]
---

We will use a set to filter out the strings with duplicate characters. Then we iterate over each sting and check if it has duplicate characters. If not, we will add it to the set. Then we will iterate over all the strings in the set and check if the string can be concatenated with the current string. If yes, we will update the maximum length.

```python
class Solution:
    def maxLength(self, arr: List[str]) -> int:
        maxlen = 0
        unique = ['']
        
        def isvalid(s):
            return len(s) == len(set(s))
        
        for word in arr:
            for j in unique:
                tmp = word + j
                if isvalid(tmp):
                    unique.append(tmp)
                    maxlen = max(maxlen, len(tmp))
                    
        return maxlen
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n)`