---
extends: _layouts.post
section: content
title: Valid anagram
date: 2022-07-12
categories: [array-and-hashmap]
---

Problem URL: [Valid anagram](https://leetcode.com/problems/valid-anagram/)

We can split both string to characters, sort and then compare each characters at every position. If we don't find any match, we return False. After comparing every character, we will return True.

```python
class Solution:
    def isAnagram(self, s: str, t: str) -> bool:
        if(len(s) != len(t)): return False
        
        s = list(s)
        t = list(t)
        s.sort()
        t.sort()        
        
        for i in range(len(s)):
            if s[i] != t[i]: 
                return False
            
        return True
```

For sorting we have complexity `O(nlog(n))`, and we will go through the whole list one by one, that is `O(n)`. So, overall time complexity `O(n)`. We don't use any extra memory, so space complexity is `O(1)`.