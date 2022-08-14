---
extends: _layouts.post
section: content
title: Word ladder
problemUrl: https://leetcode.com/problems/word-ladder/
date: 2022-08-12
categories: [graph]
---

First we will create a adjacency list by the pattern, and the pattern will be replacing one character with `*`. Then we will run BFS in the graph, and count the number of iteration it takes to complete the graph, then return the value.

```python
class Solution:
    def ladderLength(self, beginWord: str, endWord: str, wordList: List[str]) -> int:
        if endWord not in wordList:
            return 0

        nei = defaultdict(list)
        wordList.append(beginWord)
        for word in wordList:
            for j in range(len(word)):
                pattern = word[:j] + "*" + word[j+1:]
                nei[pattern].append(word)

        visit = set([beginWord])
        q = deque([beginWord])
        res = 1

        while q:
            for i in range(len(q)):
                word = q.popleft()
                if word == endWord:
                    return res
                for j in range(len(word)):
                    pattern = word[:j] + "*" + word[j+1:]
                    for neiWord in nei[pattern]:
                        if neiWord not in visit:
                            visit.add(neiWord)
                            q.append(neiWord)
            res += 1

        return 0
```

Time Complexity: `O(n^2)`, n is the length of the words. <br/>
Space Complexity: `O(n)`