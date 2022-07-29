---
extends: _layouts.post
section: content
title: Find and replace pattern
problemUrl: https://leetcode.com/problems/find-and-replace-pattern/
date: 2022-07-29
categories: [array-and-hashmap]
---

We will create a hashmap for each word counting the length of the hashmap at that position. Then we create the same hashmap for our pattern. Then we iterate over each word, match it with the pattern and return the matched value as an array.

```python
class Solution:
    def findAndReplacePattern(self, words: List[str], pattern: str) -> List[str]:
        def f(word):
            m = {}
            return [m.setdefault(c, len(m)) for c in word]
        
        fp = f(pattern)
        return [word for word in words if f(word) == fp]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`