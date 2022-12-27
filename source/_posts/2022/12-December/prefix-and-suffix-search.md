---
extends: _layouts.post
section: content
title: Prefix and suffix search
problemUrl: https://leetcode.com/problems/prefix-and-suffix-search/
date: 2022-12-27
categories: [array-and-hashmap, design]
---

We will generate all possible prefixes and suffixes for each word and store them in a hashmap. Then, we will iterate over the queries and return the maximum weight.

```python
class WordFilter:
    def __init__(self, words: List[str]):
        self.map = {}
        for weight, word in enumerate(words):
            for i in range(len(word) + 1):
                for j in range(len(word) + 1):
                    self.map[word[:i] + '#' + word[-j:]] = weight

    def f(self, prefix: str, suffix: str) -> int:
        return self.map.get(prefix + '#' + suffix, -1)

# Your WordFilter object will be instantiated and called as such:
# obj = WordFilter(words)
# param_1 = obj.f(pref,suff)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`