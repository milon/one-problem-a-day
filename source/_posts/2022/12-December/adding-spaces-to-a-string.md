---
extends: _layouts.post
section: content
title: adding-spaces-to-a-string
problemUrl: https://leetcode.com/problems/adding-spaces-to-a-string/
date: 2022-12-30
categories: [array-and-hashmap]
---

We will iterate over the string and add the spaces to the result.

```python
class Solution:
    def addSpaces(self, s: str, spaces: List[int]) -> str:
        spaces = set(spaces)
        res = ''
        for i in range(len(s)):
	        if i in spaces:
		        res += ' ' + s[i]
	        else:
		        res += s[i]
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`