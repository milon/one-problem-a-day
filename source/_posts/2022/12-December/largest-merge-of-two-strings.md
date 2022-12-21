---
extends: _layouts.post
section: content
title: Largest merge of two strings
problemUrl: https://leetcode.com/problems/largest-merge-of-two-strings/
date: 2022-12-21
categories: [greedy]
---

We will iterate through the two strings and compare the current character of each string. If the current character of `word1` is greater than the current character of `word2`, we will add the current character of `word1` to the result and increment the index of `word1`. Otherwise, we will add the current character of `word2` to the result and increment the index of `word2`. We will return the result.

```python
class Solution:
    def largestMerge(self, word1: str, word2: str) -> str:
        result = ""
        i = j = 0
        while i < len(word1) and j < len(word2):
            if word1[i] > word2[j]:
                result += word1[i]
                i += 1
            else:
                result += word2[j]
                j += 1
        result += word1[i:]
        result += word2[j:]
        return result
```

Time complexity: `O(n+m)` <br/> 
Space complexity: `O(n+m)`