---
extends: _layouts.post
section: content
title: Word pattern
problemUrl: https://leetcode.com/problems/word-pattern/
date: 2022-11-05
categories: [array-and-hashmap]
---

We will split the string to words. If the numbers of words does not match the numbers of letters in the pattern, we return false. Then we iterate over each letter in the pattern, check the position of the letter match the position of the word in the string. If not, we return false. Otherwise, we return true.

```python
class Solution:
    def wordPattern(self, pattern: str, s: str) -> bool:
        s = s.split()
        if len(s) != len(pattern):
            return False
        
        for i in range(len(pattern)):
            if pattern.find(pattern[i]) != s.index(s[i]):
                return False
        
        return True
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`