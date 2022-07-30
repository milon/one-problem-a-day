---
extends: _layouts.post
section: content
title: Top k frequent words
problemUrl: https://leetcode.com/problems/top-k-frequent-words/
date: 2022-07-30
categories: [heap]
---

First we will count all the words and then create a max heap with the count, each element will have 2 items, first will be the count, second will be the word itself. Then we pop k elements and put the words in a list and return it.

```python
class Solution:
    def topKFrequent(self, words: List[str], k: int) -> List[str]:
        count = [(-t, w) for w, t in collections.Counter(words).items()]
        heapq.heapify(count)

        return [heapq.heappop(count)[1] for _ in range(k)]
        
```

Time Complexity: `O(n + k * log(n))`, n in the the number of words, k is the top elements. <br/>
Space Complexity: `O(n)`