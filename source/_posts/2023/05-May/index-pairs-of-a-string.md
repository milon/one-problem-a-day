---
extends: _layouts.post
section: content
title: Index pairs of a string
problemUrl: https://leetcode.com/problems/index-pairs-of-a-string/
date: 2023-05-04
categories: [array-and-hashmap]
---

We will first create a set of all the words in `words`. Then, we will iterate through `text` and check if the current word is in the set. If it is, we will add the current index and the current index plus the length of the current word minus one to the result.

```python
class Solution:
    def indexPairs(self, text: str, words: List[str]) -> List[List[int]]:
        result = []
        words = set(words)
        for i in range(len(text)):
            for j in range(i, len(text)):
                if text[i:j+1] in words:
                    result.append([i, j])
        return result
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n)`