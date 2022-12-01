---
extends: _layouts.post
section: content
title: Evaluate the bracket pairs of a string
problemUrl: https://leetcode.com/problems/evaluate-the-bracket-pairs-of-a-string/
date: 2022-12-01
categories: [array-and-hashmap]
---

We will use a hashmap to store the key-value pairs. Then we will iterate over the string and if we encounter a `(`, we will start a new string. If we encounter a `)`, we will check if the string is in the hashmap, if yes, we will replace the string with the value from the hashmap, otherwise we will replace the string with an empty string. At the end we will return the string.

```python
class Solution:
    def evaluate(self, s: str, knowledge: List[List[str]]) -> str:
        lookup = dict(knowledge)
        t = s.split('(')
        res = t[0]
        for i in range(1, len(t)):
            a, b = t[i].split(')')
            res += lookup.get(a, "?") + b
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`