---
extends: _layouts.post
section: content
title: First unique character in a string
problemUrl: https://leetcode.com/problems/first-unique-character-in-a-string/
date: 2022-08-16
categories: [array-and-hashmap]
---

First we will count each character of the string. Then we iterate from the beginning, check which character has character count 1, return that. If we can't find anything with character count 1, we return -1.

```python
class Solution:
    def firstUniqChar(self, s: str) -> int:
        count = collections.Counter(list(s))
        for i, c in enumerate(s):
            if count[c] == 1:
                return i
        return -1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`

